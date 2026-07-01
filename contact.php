<?php
$siteName = 'A&T Media Sdn. Bhd.';
$siteTitle = 'Contact Us | A&T Media Sdn. Bhd. Signboard, Signage & Printing KL';
$siteDescription = 'Contact A&T Media Sdn. Bhd. for signboard, signage, printing, 3D lettering, fabric lightbox, and installation support in Kuala Lumpur, Klang Valley, Selangor, and Seremban.';
$siteKeywords = 'contact signboard KL, contact signage Kuala Lumpur, signboard quote Selangor, signage supplier Klang Valley, A&T Media contact';
$sitePhone = '+60 16-701 3295';
$sitePhoneLink = '+60167013295';
$siteEmail = 'antadv.rei@gmail.com';
$siteUrl = 'http://signboardkl.com.my';
$canonicalUrl = rtrim($siteUrl, '/') . '/contact.php';
$ogImage = rtrim($siteUrl, '/') . '/assets/signboardkl-hero.png';
$ogImageAlt = 'A&T Media signage and signboard services';
$logoImage = rtrim($siteUrl, '/') . '/assets/ant-signage-logo.png';
$addressText = '16, Jalan Nilam 1/6, Taman Teknologi Tinggi Subang, 47500 Subang Jaya, Selangor, Malaysia.';
$whatsAppUrl = 'https://wa.me/60167013295?text=' . rawurlencode('Hi A&T Media, I would like to request a signage quote.');
$mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($addressText);

$structuredData = [
  '@context' => 'https://schema.org',
  '@type' => 'ContactPage',
  'name' => $siteTitle,
  'description' => $siteDescription,
  'url' => $canonicalUrl,
  'mainEntity' => [
    '@type' => 'LocalBusiness',
    'name' => $siteName,
    'image' => $ogImage,
    'logo' => $logoImage,
    'url' => rtrim($siteUrl, '/') . '/',
    'telephone' => $sitePhone,
    'email' => $siteEmail,
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => '16, Jalan Nilam 1/6, Taman Teknologi Tinggi Subang',
      'postalCode' => '47500',
      'addressLocality' => 'Subang Jaya',
      'addressRegion' => 'Selangor',
      'addressCountry' => 'MY',
    ],
    'areaServed' => [
      'Kuala Lumpur',
      'Klang Valley',
      'Selangor',
      'Seremban',
    ],
  ],
];
?>
<!doctype html>
<html lang="en">
  <head>
    <?php require __DIR__ . '/includes/head.php'; ?>
    <style>
      :root {
        --brand-red: #d71920;
        --brand-red-dark: #a91117;
        --ink: #111111;
        --graphite: #2c2c2c;
        --muted: #747474;
        --soft-grey: #f3f4f6;
        --line: #dddddd;
      }

      body {
        background: #ffffff;
        color: var(--ink);
        font-family: Arial, Helvetica, sans-serif;
      }

      .navbar {
        background: #ffffff;
        border-bottom: 1px solid var(--line);
      }

      .navbar-brand {
        align-items: center;
        color: var(--ink);
        display: inline-flex;
        font-weight: 800;
        gap: 12px;
        letter-spacing: 0;
        padding-bottom: 0.2rem;
        padding-top: 0.2rem;
      }

      .navbar-brand img {
        height: 58px;
        object-fit: contain;
        width: 58px;
      }

      .navbar-brand span {
        color: var(--ink);
        font-size: 1.2rem;
        font-weight: 800;
        line-height: 1;
      }

      .navbar-brand .brand-accent {
        color: var(--brand-red);
      }

      .navbar-light .navbar-nav .nav-link {
        color: var(--graphite);
        font-weight: 600;
      }

      .navbar-light .navbar-nav .nav-link:hover,
      .navbar-light .navbar-nav .nav-link.active {
        color: var(--brand-red);
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

      .page-title {
        background: #f5f5f5;
        border-bottom: 1px solid var(--line);
        padding: 46px 0;
      }

      .page-title h1 {
        font-size: 2.2rem;
        font-weight: 850;
        line-height: 1.18;
        margin: 0;
      }

      .breadcrumb-bar {
        border-bottom: 1px solid var(--line);
        background: #ffffff;
      }

      .breadcrumb {
        background: transparent;
        margin-bottom: 0;
        padding: 16px 0;
      }

      .breadcrumb a {
        color: var(--brand-red);
        font-weight: 700;
      }

      section {
        padding: 76px 0;
      }

      .section-kicker {
        color: var(--brand-red);
        font-size: 0.78rem;
        font-weight: 900;
        letter-spacing: 0.12em;
        margin-bottom: 12px;
        text-transform: uppercase;
      }

      .section-title {
        font-size: 2.2rem;
        font-weight: 850;
        line-height: 1.16;
      }

      .section-copy {
        color: var(--muted);
        line-height: 1.8;
      }

      .contact-hero {
        background: var(--ink);
        color: #ffffff;
      }

      .contact-hero .section-copy {
        color: #e1e1e1;
      }

      .contact-box {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        padding: 26px;
      }

      .contact-box a {
        color: #ffffff;
        font-weight: 700;
      }

      .contact-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 28px;
      }

      .contact-actions .btn {
        font-weight: 800;
      }

      .contact-form-card {
        background: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 8px;
        box-shadow: 0 18px 42px rgba(0, 0, 0, 0.24);
        color: var(--ink);
        padding: 30px;
      }

      .contact-form-card h2 {
        font-size: 1.25rem;
        font-weight: 850;
        margin-bottom: 18px;
      }

      .contact-form-card label {
        color: var(--graphite);
        font-size: 0.9rem;
        font-weight: 800;
      }

      .contact-form-card .form-control {
        border-color: #d8dbe0;
        border-radius: 8px;
        color: var(--ink);
        min-height: 48px;
      }

      .contact-form-card textarea.form-control {
        min-height: 132px;
        resize: vertical;
      }

      .contact-form-card .form-control:focus {
        border-color: var(--brand-red);
        box-shadow: 0 0 0 0.2rem rgba(215, 25, 32, 0.16);
      }

      .info-card {
        border: 1px solid var(--line);
        border-radius: 8px;
        height: 100%;
        padding: 28px;
      }

      .info-card i {
        color: var(--brand-red);
        font-size: 1.55rem;
        margin-bottom: 18px;
      }

      .info-card h2 {
        font-size: 1.2rem;
        font-weight: 850;
        margin-bottom: 12px;
      }

      .info-card p,
      .info-card a {
        color: var(--graphite);
        line-height: 1.7;
      }

      .info-card a {
        font-weight: 800;
      }

      footer {
        background: #ffffff;
        border-top: 1px solid var(--line);
        color: var(--muted);
        padding: 24px 0;
      }

      .footer-brand {
        color: var(--ink);
        font-weight: 800;
        margin-bottom: 4px;
      }

      .footer-tagline {
        margin-bottom: 4px;
      }

      .footer-group,
      .footer-copyright {
        font-size: 0.92rem;
      }

      .whatsapp-float {
        align-items: center;
        background: #25d366;
        border-radius: 50%;
        bottom: 24px;
        box-shadow: 0 12px 28px rgba(17, 17, 17, 0.24);
        color: #ffffff;
        display: inline-flex;
        font-size: 2rem;
        height: 60px;
        justify-content: center;
        position: fixed;
        right: 24px;
        transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
        width: 60px;
        z-index: 1040;
      }

      .whatsapp-float:hover,
      .whatsapp-float:focus {
        background: #1fb85a;
        box-shadow: 0 16px 32px rgba(17, 17, 17, 0.32);
        color: #ffffff;
        text-decoration: none;
        transform: translateY(-2px);
      }

      @media (max-width: 767.98px) {
        .page-title h1,
        .section-title {
          font-size: 1.75rem;
        }

        section {
          padding: 56px 0;
        }

        .contact-form-card {
          padding: 24px;
        }

        .whatsapp-float {
          bottom: 18px;
          font-size: 1.8rem;
          height: 54px;
          right: 18px;
          width: 54px;
        }
      }
    </style>
  </head>
  <body>
    <?php
    $activePage = 'contact';
    $navQuoteUrl = $whatsAppUrl;
    $navQuoteExternal = true;
    require __DIR__ . '/includes/nav.php';
    ?>

    <header class="page-title">
      <div class="container">
        <h1>Contact Us</h1>
      </div>
    </header>

    <div class="breadcrumb-bar">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
          </ol>
        </nav>
      </div>
    </div>

    <section class="contact-hero">
      <div class="container">
        <div class="row align-items-start">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="section-kicker">Get a quote</div>
            <h2 class="section-title mb-3">Talk to A&T Media about your signage project.</h2>
            <p class="section-copy">Send your project details, artwork, measurements, and location. We can help with signboard, signage, printing, 3D lettering, lightbox, and installation planning.</p>
            <div class="contact-box mt-4">
              <p class="mb-3"><i class="fas fa-phone-alt mr-2 text-danger"></i><a href="tel:<?php echo htmlspecialchars($sitePhoneLink, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($sitePhone, ENT_QUOTES, 'UTF-8'); ?></a></p>
              <p class="mb-3"><i class="fas fa-envelope mr-2 text-danger"></i><a href="mailto:<?php echo htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?></a></p>
              <p class="mb-0"><i class="fas fa-map-marker-alt mr-2 text-danger"></i><?php echo htmlspecialchars($addressText, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="contact-actions">
              <a class="btn btn-red" href="<?php echo htmlspecialchars($whatsAppUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><i class="fab fa-whatsapp mr-2"></i>WhatsApp Us</a>
              <a class="btn btn-outline-light" href="<?php echo htmlspecialchars($mapUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><i class="fas fa-map-marked-alt mr-2"></i>Open Map</a>
            </div>
          </div>
          <div class="col-lg-7">
            <form class="contact-form-card" action="contact-submit.php" method="post">
              <h2>Tell us about your project</h2>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="contactName">Name</label>
                  <input id="contactName" class="form-control" type="text" name="Name" autocomplete="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="contactPhone">Phone</label>
                  <input id="contactPhone" class="form-control" type="tel" name="Phone" autocomplete="tel" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="contactEmail">Email</label>
                  <input id="contactEmail" class="form-control" type="email" name="Email" autocomplete="email">
                </div>
                <div class="form-group col-md-6">
                  <label for="contactService">Service</label>
                  <select id="contactService" class="form-control" name="Service">
                    <option value="Signboard">Signboard</option>
                    <option value="Signage">Signage</option>
                    <option value="Printing">Printing</option>
                    <option value="Fabric Lightbox">Fabric Lightbox</option>
                    <option value="3D Lettering">3D Lettering</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="contactLocation">Project location</label>
                <input id="contactLocation" class="form-control" type="text" name="Project_Location" placeholder="Kuala Lumpur, Klang Valley, Selangor, Seremban">
              </div>
              <div class="form-group">
                <label for="contactMessage">Project details</label>
                <textarea id="contactMessage" class="form-control" name="Project_Details" placeholder="Share size, quantity, timeline, artwork status, installation needs, or reference ideas." required></textarea>
              </div>
              <button class="btn btn-red btn-lg btn-block" type="submit"><i class="fas fa-paper-plane mr-2"></i>Send Enquiry</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <article class="info-card">
              <i class="fas fa-phone-alt" aria-hidden="true"></i>
              <h2>Call</h2>
              <p class="mb-0"><a href="tel:<?php echo htmlspecialchars($sitePhoneLink, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($sitePhone, ENT_QUOTES, 'UTF-8'); ?></a></p>
            </article>
          </div>
          <div class="col-md-4 mb-4 mb-md-0">
            <article class="info-card">
              <i class="fas fa-envelope" aria-hidden="true"></i>
              <h2>Email</h2>
              <p class="mb-0"><a href="mailto:<?php echo htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?></a></p>
            </article>
          </div>
          <div class="col-md-4">
            <article class="info-card">
              <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
              <h2>Visit</h2>
              <p class="mb-0"><a href="<?php echo htmlspecialchars($mapUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener"><?php echo htmlspecialchars($addressText, ENT_QUOTES, 'UTF-8'); ?></a></p>
            </article>
          </div>
        </div>
      </div>
    </section>

    <?php require __DIR__ . '/includes/footer.php'; ?>

    <a class="whatsapp-float" href="<?php echo htmlspecialchars($whatsAppUrl, ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
      <i class="fab fa-whatsapp" aria-hidden="true"></i>
    </a>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
