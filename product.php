<?php
require_once __DIR__ . '/includes/catalog.php';

$siteName = 'A&T Media Sdn. Bhd.';
$siteUrl = 'http://signboardkl.com.my';
$logoImage = rtrim($siteUrl, '/') . '/assets/ant-signage-logo.png';
$whatsAppPhone = '60167013295';

$catalog = catalog_load();
$categoryMap = catalog_category_map($catalog);
$productId = (string) ($_GET['id'] ?? '');
$product = null;

foreach ($catalog['products'] as $item) {
  if (($item['id'] ?? '') === $productId) {
    $product = $item;
    break;
  }
}

if (!$product) {
  http_response_code(404);
  $siteTitle = 'Product Not Found | A&T Media Sdn. Bhd.';
  $siteDescription = 'The requested product could not be found.';
  $canonicalUrl = rtrim($siteUrl, '/') . '/product.php';
  $ogImage = rtrim($siteUrl, '/') . '/assets/signboardkl-hero.png';
} else {
  $product['image'] = $product['image'] ?: CATALOG_DEFAULT_IMAGE;
  $product['description'] = trim((string) ($product['description'] ?? ''));
  $product['category'] = catalog_category_title($categoryMap, (string) ($product['category_id'] ?? ''));
  $siteTitle = ($product['seo_title'] ?: $product['title']) . ' | A&T Media Sdn. Bhd.';
  $siteDescription = $product['meta_description'] ?: ($product['description'] ?: 'Custom signage product by A&T Media Sdn. Bhd.');
  $canonicalUrl = rtrim($siteUrl, '/') . '/product.php?id=' . rawurlencode($product['id']);
  $ogImage = rtrim($siteUrl, '/') . '/' . ltrim($product['image'], '/');
}

$siteKeywords = $product['seo_keywords'] ?? '';
$whatsAppText = $product ? 'Hi, I am interested in ' . $product['title'] . '. ' . $canonicalUrl : 'Hi, I am interested to know more.';
$whatsAppUrl = 'https://wa.me/' . $whatsAppPhone . '?text=' . rawurlencode($whatsAppText);
$structuredData = $product ? [
  '@context' => 'https://schema.org',
  '@type' => 'Service',
  'name' => $product['title'],
  'description' => $siteDescription,
  'image' => $ogImage,
  'url' => $canonicalUrl,
  'provider' => [
    '@type' => 'LocalBusiness',
    'name' => $siteName,
    'url' => rtrim($siteUrl, '/') . '/',
  ],
] : null;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <?php if ($siteKeywords !== ''): ?><meta name="keywords" content="<?php echo htmlspecialchars($siteKeywords, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
    <meta name="robots" content="<?php echo $product ? 'index, follow' : 'noindex, follow'; ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($logoImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="en_MY">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <?php if ($structuredData): ?><script type="application/ld+json"><?php echo json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script><?php endif; ?>
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
        color: var(--ink);
        font-size: 2.25rem;
        font-weight: 850;
        margin: 0;
      }

      .breadcrumb-bar {
        background: #ffffff;
        border-bottom: 1px solid var(--line);
        padding: 15px 0;
      }

      .breadcrumb {
        background: transparent;
        border-radius: 0;
        font-size: 0.92rem;
        margin: 0;
        padding: 0;
      }

      .breadcrumb a {
        color: var(--muted);
        font-weight: 700;
      }

      .breadcrumb-item.active {
        color: var(--brand-red);
        font-weight: 800;
      }

      .product-detail {
        padding: 54px 0 76px;
      }

      .product-photo {
        background: #111111;
        border: 1px solid var(--line);
        overflow: hidden;
      }

      .product-photo img {
        aspect-ratio: 4 / 3;
        display: block;
        height: auto;
        object-fit: cover;
        width: 100%;
      }

      .product-info {
        border-top: 4px solid var(--brand-red);
        padding-top: 24px;
      }

      .product-category {
        color: var(--brand-red);
        display: block;
        font-size: 0.82rem;
        font-weight: 850;
        margin-bottom: 12px;
        text-transform: uppercase;
      }

      .product-info h2 {
        font-size: 2rem;
        font-weight: 850;
        line-height: 1.18;
        margin-bottom: 18px;
      }

      .product-info p {
        color: var(--graphite);
        font-size: 1rem;
        line-height: 1.75;
        margin-bottom: 26px;
      }

      .detail-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
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

      @media (max-width: 767.98px) {
        .page-title h1 {
          font-size: 1.75rem;
        }

        .product-info {
          margin-top: 28px;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php" aria-label="A&T Media Sdn. Bhd.">
          <img src="assets/ant-signage-logo.png" alt="A&T Media Sdn. Bhd. logo">
          <span>Signboard<span class="brand-accent">KL</span></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ml-auto align-items-lg-center">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="products.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php#projects">Projects</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php#work">About</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php#process">Process</a></li>
            <li class="nav-item ml-lg-3"><a class="btn btn-red px-4" href="index.php#contact"><i class="fas fa-phone-alt mr-2"></i>Get Quote</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="page-title">
      <div class="container">
        <h1><?php echo htmlspecialchars($product['title'] ?? 'Product Not Found', ENT_QUOTES, 'UTF-8'); ?></h1>
      </div>
    </header>

    <div class="breadcrumb-bar">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="products.php">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($product['title'] ?? 'Not Found', ENT_QUOTES, 'UTF-8'); ?></li>
          </ol>
        </nav>
      </div>
    </div>

    <main class="product-detail">
      <div class="container">
        <?php if (!$product): ?>
          <div class="product-info">
            <h2>Product Not Found</h2>
            <p>The product you opened is no longer available. Please return to the products page to browse the current catalog.</p>
            <a class="btn btn-red" href="products.php">Back to Products</a>
          </div>
        <?php else: ?>
          <div class="row align-items-start">
            <div class="col-lg-6 mb-4 mb-lg-0">
              <div class="product-photo">
                <img src="<?php echo htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8'); ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <section class="product-info">
                <span class="product-category"><?php echo htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8'); ?></span>
                <h2><?php echo htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($product['description'] ?: 'Contact A&T Media for product details, artwork planning, material recommendations, and installation support.', ENT_QUOTES, 'UTF-8')); ?></p>
                <div class="detail-actions">
                  <a class="btn btn-red btn-lg" href="<?php echo htmlspecialchars($whatsAppUrl, ENT_QUOTES, 'UTF-8'); ?>">
                    <i class="fab fa-whatsapp mr-2" aria-hidden="true"></i>WhatsApp Us
                  </a>
                  <a class="btn btn-outline-secondary btn-lg" href="products.php">Back to Products</a>
                </div>
              </section>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </main>

    <footer>
      <div class="container">
        <div class="footer-brand">A&amp;T Media Sdn. Bhd.</div>
        <div class="footer-tagline">Trusted Signboard Supplier in Kuala Lumpur Since 2022</div>
        <div class="footer-group">Part of ANT Group</div>
        <div class="footer-copyright mt-3">Copyright &copy; 2026 A&amp;T Media Sdn. Bhd. 202501057902 (1659308-W) All rights reserved.</div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
