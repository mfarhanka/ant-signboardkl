<?php
declare(strict_types=1);

$siteName = 'A&T Media Sdn. Bhd.';
$siteTitle = 'Contact Form | A&T Media Sdn. Bhd.';
$siteUrl = 'http://signboardkl.com.my';
$logoImage = rtrim($siteUrl, '/') . '/assets/ant-signage-logo.png';
$defaultConfig = [
  'smtp_host' => '',
  'smtp_port' => 587,
  'smtp_secure' => 'tls',
  'smtp_username' => '',
  'smtp_password' => '',
  'from_email' => 'info@signboardkl.com.my',
  'from_name' => 'A&T Media Sdn. Bhd.',
  'to_email' => 'antadv.rei@gmail.com',
  'to_name' => 'A&T Media Sdn. Bhd.',
];
$configFile = __DIR__ . '/data/contact-mail.config.php';
$mailConfig = is_file($configFile) ? require $configFile : [];
$mailConfig = array_merge($defaultConfig, is_array($mailConfig) ? $mailConfig : []);

function clean_input(string $value, int $maxLength = 1000): string
{
  $value = trim(str_replace(["\r", "\0"], '', $value));
  return substr($value, 0, $maxLength);
}

function header_safe(string $value): string
{
  return trim(str_replace(["\r", "\n", "\0"], '', $value));
}

function smtp_read($socket): string
{
  $response = '';
  while (($line = fgets($socket, 515)) !== false) {
    $response .= $line;
    if (isset($line[3]) && $line[3] === ' ') {
      break;
    }
  }
  return $response;
}

function smtp_expect($socket, array $codes): string
{
  $response = smtp_read($socket);
  $code = (int) substr($response, 0, 3);
  if (!in_array($code, $codes, true)) {
    throw new RuntimeException('SMTP server rejected the message.');
  }
  return $response;
}

function smtp_command($socket, string $command, array $codes): string
{
  fwrite($socket, $command . "\r\n");
  return smtp_expect($socket, $codes);
}

function smtp_send_mail(array $config, string $subject, string $body, string $replyToEmail, string $replyToName): void
{
  $host = (string) $config['smtp_host'];
  $port = (int) $config['smtp_port'];
  $secure = strtolower((string) $config['smtp_secure']);
  $username = (string) $config['smtp_username'];
  $password = (string) $config['smtp_password'];
  $fromEmail = header_safe((string) $config['from_email']);
  $fromName = header_safe((string) $config['from_name']);
  $toEmail = header_safe((string) $config['to_email']);
  $toName = header_safe((string) $config['to_name']);

  if ($host === '' || $username === '' || $password === '') {
    throw new RuntimeException('SMTP is not configured yet.');
  }

  $target = ($secure === 'ssl' ? 'ssl://' : '') . $host;
  $socket = @stream_socket_client($target . ':' . $port, $errno, $errstr, 20, STREAM_CLIENT_CONNECT);
  if (!$socket) {
    throw new RuntimeException('Could not connect to SMTP server.');
  }

  stream_set_timeout($socket, 20);

  try {
    smtp_expect($socket, [220]);
    smtp_command($socket, 'EHLO signboardkl.com.my', [250]);

    if ($secure === 'tls') {
      smtp_command($socket, 'STARTTLS', [220]);
      if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
        throw new RuntimeException('Could not start SMTP encryption.');
      }
      smtp_command($socket, 'EHLO signboardkl.com.my', [250]);
    }

    smtp_command($socket, 'AUTH LOGIN', [334]);
    smtp_command($socket, base64_encode($username), [334]);
    smtp_command($socket, base64_encode($password), [235]);
    smtp_command($socket, 'MAIL FROM:<' . $fromEmail . '>', [250]);
    smtp_command($socket, 'RCPT TO:<' . $toEmail . '>', [250, 251]);
    smtp_command($socket, 'DATA', [354]);

    $headers = [
      'From: ' . ($fromName !== '' ? '"' . addcslashes($fromName, '"\\') . '" ' : '') . '<' . $fromEmail . '>',
      'To: ' . ($toName !== '' ? '"' . addcslashes($toName, '"\\') . '" ' : '') . '<' . $toEmail . '>',
      'Reply-To: ' . ($replyToName !== '' ? '"' . addcslashes($replyToName, '"\\') . '" ' : '') . '<' . $replyToEmail . '>',
      'Subject: ' . header_safe($subject),
      'MIME-Version: 1.0',
      'Content-Type: text/plain; charset=UTF-8',
      'Content-Transfer-Encoding: 8bit',
      'Date: ' . date(DATE_RFC2822),
    ];
    $message = implode("\r\n", $headers) . "\r\n\r\n" . str_replace("\n.", "\n..", $body);
    fwrite($socket, $message . "\r\n.\r\n");
    smtp_expect($socket, [250]);
    smtp_command($socket, 'QUIT', [221]);
  } finally {
    fclose($socket);
  }
}

$status = 'error';
$title = 'Unable to send enquiry';
$message = 'Please WhatsApp or email A&T Media directly while the contact form is being configured.';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: contact.php');
  exit;
}

$name = clean_input((string) ($_POST['Name'] ?? ''), 120);
$phone = clean_input((string) ($_POST['Phone'] ?? ''), 80);
$email = clean_input((string) ($_POST['Email'] ?? ''), 180);
$service = clean_input((string) ($_POST['Service'] ?? ''), 120);
$location = clean_input((string) ($_POST['Project_Location'] ?? $_POST['Project Location'] ?? ''), 180);
$details = clean_input((string) ($_POST['Project_Details'] ?? $_POST['Project Details'] ?? ''), 3000);
$replyToEmail = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : (string) $mailConfig['from_email'];

if ($name === '' || $phone === '' || $details === '') {
  $message = 'Please complete your name, phone number, and project details before sending.';
} else {
  $subject = 'New signage enquiry from ' . $name;
  $body = implode("\n", [
    'New enquiry from signboardkl.com.my',
    '',
    'Name: ' . $name,
    'Phone: ' . $phone,
    'Email: ' . ($email !== '' ? $email : 'Not provided'),
    'Service: ' . ($service !== '' ? $service : 'Not provided'),
    'Project location: ' . ($location !== '' ? $location : 'Not provided'),
    '',
    'Project details:',
    $details,
    '',
    'Sent at: ' . date('Y-m-d H:i:s'),
  ]);

  try {
    smtp_send_mail($mailConfig, $subject, $body, $replyToEmail, $name);
    $status = 'success';
    $title = 'Enquiry sent';
    $message = 'Thank you. Your enquiry has been sent to A&T Media.';
  } catch (Throwable $exception) {
    error_log('Contact form failed: ' . $exception->getMessage());
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($logoImage, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      :root {
        --brand-red: #d71920;
        --brand-red-dark: #a91117;
        --ink: #111111;
        --muted: #747474;
        --line: #dddddd;
      }

      body {
        background: #f5f5f5;
        color: var(--ink);
        font-family: Arial, Helvetica, sans-serif;
      }

      .result-wrap {
        align-items: center;
        display: flex;
        min-height: 100vh;
        padding: 40px 0;
      }

      .result-card {
        background: #ffffff;
        border: 1px solid var(--line);
        border-radius: 8px;
        margin: 0 auto;
        max-width: 620px;
        padding: 38px;
        text-align: center;
      }

      .result-icon {
        align-items: center;
        border-radius: 50%;
        color: #ffffff;
        display: inline-flex;
        font-size: 1.7rem;
        height: 68px;
        justify-content: center;
        margin-bottom: 22px;
        width: 68px;
      }

      .result-icon.success {
        background: #25d366;
      }

      .result-icon.error {
        background: var(--brand-red);
      }

      h1 {
        font-size: 2rem;
        font-weight: 850;
      }

      p {
        color: var(--muted);
        line-height: 1.7;
      }

      .btn-red {
        background: var(--brand-red);
        border-color: var(--brand-red);
        color: #ffffff;
        font-weight: 700;
      }

      .btn-red:hover,
      .btn-red:focus {
        background: var(--brand-red-dark);
        border-color: var(--brand-red-dark);
        color: #ffffff;
      }
    </style>
  </head>
  <body>
    <main class="result-wrap">
      <div class="container">
        <section class="result-card">
          <div class="result-icon <?php echo $status === 'success' ? 'success' : 'error'; ?>">
            <i class="fas <?php echo $status === 'success' ? 'fa-check' : 'fa-exclamation'; ?>" aria-hidden="true"></i>
          </div>
          <h1><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>
          <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
          <div class="mt-4">
            <a class="btn btn-red mr-sm-2 mb-2" href="contact.php">Back to Contact</a>
            <a class="btn btn-outline-secondary mb-2" href="https://wa.me/60167013295" target="_blank" rel="noopener">WhatsApp Us</a>
          </div>
        </section>
      </div>
    </main>
  </body>
</html>
