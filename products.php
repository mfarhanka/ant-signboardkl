<?php
$siteName = 'A&T Media Sdn. Bhd.';
$siteTitle = 'Products | A&T Media Sdn. Bhd. Signboard, Signage & Printing Malaysia';
$siteDescription = 'Explore A&T Media products including 3D box up lettering, signboard, signage, printing, fabric lightbox, and standee signage solutions in Malaysia.';
$siteKeywords = 'products signboard Malaysia, 3D box up lettering, fabric lightbox, standee signage, signage products Kuala Lumpur';
$siteUrl = 'http://signboardkl.com.my';
$canonicalUrl = rtrim($siteUrl, '/') . '/products.php';
$ogImage = rtrim($siteUrl, '/') . '/assets/signboardkl-hero.png';
$logoImage = rtrim($siteUrl, '/') . '/assets/ant-signage-logo.png';

$products = [
  [
    'id' => 'box-up-lettering',
    'title' => '3D Box Up Lettering',
    'icon' => 'fa-font',
    'summary' => 'Dimensional lettering for storefronts, offices, and branded environments that need stronger presence and premium finishing.',
    'details' => [
      'Built for facade branding, reception signs, and premium commercial frontage.',
      'Material options include acrylic, aluminium, and stainless steel combinations.',
      'Suitable for illuminated and non-illuminated brand applications.',
    ],
    'tags' => ['Acrylic Lettering', 'Aluminium / Acrylic', 'Aluminium Lettering', 'Stainless Steel'],
  ],
  [
    'id' => 'signboard',
    'title' => 'Signboard',
    'icon' => 'fa-store',
    'summary' => 'Custom signboard solutions for shops, commercial units, construction sites, and business frontage.',
    'details' => [
      'Designed for strong street visibility and brand recognition.',
      'Front-lit, back-lit, and lightbox formats available based on site requirements.',
      'Supports fabrication, installation, and finishing coordination.',
    ],
    'tags' => ['3D Lighting', 'Back-Lit', 'Front-Lit', 'Lightbox', 'Aluminium Strip Base'],
  ],
  [
    'id' => 'signage',
    'title' => 'Signage',
    'icon' => 'fa-lightbulb',
    'summary' => 'Indoor and outdoor signage designed for clear brand visibility, direction, promotion, and display.',
    'details' => [
      'Suitable for wayfinding, directional systems, site boards, and branded displays.',
      'Covers retail, office, construction, and promotional environments.',
      'Can be produced for permanent installation or campaign-based usage.',
    ],
    'tags' => ['Billboard & Hoarding', 'Indoor Signage', 'LED Display', 'Pylon & Directional', 'Road Sign'],
  ],
  [
    'id' => 'printing',
    'title' => 'Printing',
    'icon' => 'fa-print',
    'summary' => 'Commercial printing support for promotional displays, banners, decals, and business graphics.',
    'details' => [
      'Ideal for product launches, events, business promotions, and retail campaigns.',
      'Supports indoor and outdoor print applications with practical finishing choices.',
      'Works alongside signboard and signage projects for one-stop brand rollout.',
    ],
    'tags' => ['Display Set', 'Wood Easel Stand', 'Exhibition Booth', 'Backdrop Display', 'Sticker Service'],
  ],
  [
    'id' => 'fabric-lightbox',
    'title' => 'Fabric Lightbox',
    'icon' => 'fa-tools',
    'summary' => 'Clean illuminated display systems for retail, exhibition, showroom, and high-visibility brand spaces.',
    'details' => [
      'Creates even lighting with clean graphic presentation for premium environments.',
      'Useful for showrooms, pop-up spaces, exhibitions, and retail display walls.',
      'Available in soft fabric and double-sided formats.',
    ],
    'tags' => ['Soft Fabric Lightbox', 'Double Sided', 'Retail Display'],
  ],
  [
    'id' => 'standee-signage',
    'title' => 'Standee Signage',
    'icon' => 'fa-ruler-combined',
    'summary' => 'Portable display signage for events, retail floors, campaigns, wayfinding, and product promotions.',
    'details' => [
      'Fast to deploy for campaigns, events, and temporary promotional messaging.',
      'Well suited for indoor activations, counters, and product awareness points.',
      'Can be paired with printed graphics and other branded display materials.',
    ],
    'tags' => ['Roll Up Bunting', 'Campaign Display', 'Floor Standee'],
  ],
];

$structuredData = [
  '@context' => 'https://schema.org',
  '@type' => 'CollectionPage',
  'name' => $siteTitle,
  'description' => $siteDescription,
  'url' => $canonicalUrl,
  'isPartOf' => [
    '@type' => 'WebSite',
    'name' => $siteName,
    'url' => rtrim($siteUrl, '/') . '/',
  ],
  'about' => array_map(static function ($product) {
    return [
      '@type' => 'Service',
      'name' => $product['title'],
      'description' => $product['summary'],
    ];
  }, $products),
];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($siteKeywords, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($logoImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="en_MY">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="A&T Media products and signage solutions">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script type="application/ld+json"><?php echo json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
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

      html {
        scroll-behavior: smooth;
      }

      body {
        color: var(--ink);
        font-family: Arial, Helvetica, sans-serif;
        background: #ffffff;
      }

      .navbar {
        border-bottom: 1px solid var(--line);
        background: #ffffff;
      }

      .navbar-brand img {
        width: 58px;
        height: 58px;
        object-fit: contain;
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

      .page-hero {
        position: relative;
        overflow: hidden;
        background: var(--ink);
      }

      .page-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 45%, rgba(0, 0, 0, 0.28) 100%), url('assets/signboardkl-hero.png') center / cover no-repeat;
      }

      .page-hero-content {
        position: relative;
        z-index: 1;
        padding: 88px 0 92px;
        color: #ffffff;
      }

      .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-size: 0.82rem;
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 18px;
      }

      .eyebrow::before {
        content: '';
        width: 38px;
        height: 3px;
        background: var(--brand-red);
      }

      .page-hero h1 {
        font-size: clamp(2.3rem, 6vw, 4.4rem);
        font-weight: 900;
        line-height: 1;
        margin-bottom: 20px;
      }

      .page-hero p {
        max-width: 650px;
        color: #f1f1f1;
        font-size: 1.08rem;
        line-height: 1.75;
      }

      section {
        padding: 72px 0;
      }

      .section-kicker {
        color: var(--brand-red);
        font-weight: 800;
        text-transform: uppercase;
        margin-bottom: 8px;
      }

      .section-title {
        font-size: 2.2rem;
        font-weight: 850;
        margin-bottom: 16px;
      }

      .section-copy {
        color: var(--muted);
        line-height: 1.75;
      }

      .product-nav {
        position: sticky;
        top: 92px;
        border: 1px solid var(--line);
        border-radius: 10px;
        background: #ffffff;
        padding: 24px;
      }

      .product-nav h2 {
        font-size: 1rem;
        font-weight: 800;
        margin-bottom: 16px;
      }

      .product-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
      }

      .product-nav li + li {
        border-top: 1px solid #efefef;
      }

      .product-nav a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 0;
        color: var(--graphite);
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
      }

      .product-nav a:hover {
        color: var(--brand-red);
      }

      .product-nav i {
        color: #8e8e8e;
        font-size: 0.8rem;
      }

      .product-section {
        border: 1px solid var(--line);
        border-radius: 12px;
        background: #ffffff;
        padding: 30px;
        margin-bottom: 24px;
        box-shadow: 0 18px 42px rgba(17, 17, 17, 0.05);
      }

      .product-head {
        display: flex;
        align-items: flex-start;
        gap: 18px;
        margin-bottom: 18px;
      }

      .product-icon {
        width: 54px;
        height: 54px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: var(--brand-red);
        color: #ffffff;
        font-size: 1.4rem;
        flex-shrink: 0;
      }

      .product-section h3 {
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 8px;
      }

      .product-section p {
        color: var(--graphite);
        line-height: 1.75;
      }

      .product-points {
        list-style: none;
        padding: 0;
        margin: 20px 0 0;
      }

      .product-points li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 12px;
        color: var(--graphite);
      }

      .product-points i {
        color: var(--brand-red);
        margin-right: 12px;
        margin-top: 5px;
      }

      .product-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 20px;
      }

      .product-tags span {
        border: 1px solid var(--line);
        border-radius: 999px;
        padding: 7px 10px;
        font-size: 0.82rem;
        font-weight: 700;
        color: var(--graphite);
      }

      .support-band {
        background: var(--soft-grey);
      }

      .support-card {
        height: 100%;
        border: 1px solid var(--line);
        border-radius: 10px;
        background: #ffffff;
        padding: 24px;
      }

      .support-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        margin-bottom: 10px;
      }

      .support-card p {
        color: var(--muted);
        line-height: 1.7;
        margin-bottom: 0;
      }

      .cta {
        background: var(--ink);
        color: #ffffff;
      }

      .cta .section-copy {
        color: #e1e1e1;
      }

      .contact-box {
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.05);
        padding: 26px;
      }

      .contact-box a {
        color: #ffffff;
        font-weight: 700;
      }

      footer {
        background: #ffffff;
        border-top: 1px solid var(--line);
        color: var(--muted);
        padding: 24px 0;
      }

      @media (max-width: 991.98px) {
        .product-nav {
          position: static;
          margin-bottom: 28px;
        }
      }

      @media (max-width: 575.98px) {
        .page-hero-content {
          padding: 72px 0 78px;
        }

        section {
          padding: 56px 0;
        }

        .product-section {
          padding: 22px;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
      <div class="container">
        <a class="navbar-brand" href="index.php" aria-label="A&T Media Sdn. Bhd.">
          <img src="assets/ant-signage-logo.png" alt="A&T Media Sdn. Bhd. logo">
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

    <header class="page-hero">
      <div class="container">
        <div class="page-hero-content">
          <div class="eyebrow">Products</div>
          <h1>Signboard, signage, printing, and display products for commercial brands.</h1>
          <p>Browse the core A&T Media product categories and jump straight into the solution type that fits your storefront, campaign, showroom, office, or site requirement.</p>
          <a class="btn btn-red btn-lg px-4 mt-3" href="#product-list"><i class="fas fa-th-large mr-2"></i>Explore Products</a>
        </div>
      </div>
    </header>

    <section id="product-list">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7">
            <div class="section-kicker">Product categories</div>
            <h2 class="section-title">A focused product page for the services customers ask for most.</h2>
          </div>
          <div class="col-lg-5">
            <p class="section-copy">Use the quick list on the left to jump between product types, then review the main details, practical use cases, and common formats for each category.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-xl-3">
            <aside class="product-nav" aria-label="Products navigation">
              <h2>Products</h2>
              <ul>
                <?php foreach ($products as $product): ?>
                  <li>
                    <a href="#<?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>">
                      <i class="fas fa-angle-right" aria-hidden="true"></i>
                      <span><?php echo htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </aside>
          </div>
          <div class="col-lg-8 col-xl-9">
            <?php foreach ($products as $product): ?>
              <article id="<?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>" class="product-section">
                <div class="product-head">
                  <div class="product-icon"><i class="fas <?php echo htmlspecialchars($product['icon'], ENT_QUOTES, 'UTF-8'); ?>" aria-hidden="true"></i></div>
                  <div>
                    <h3><?php echo htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                    <p class="mb-0"><?php echo htmlspecialchars($product['summary'], ENT_QUOTES, 'UTF-8'); ?></p>
                  </div>
                </div>
                <ul class="product-points">
                  <?php foreach ($product['details'] as $detail): ?>
                    <li><i class="fas fa-check-circle" aria-hidden="true"></i><span><?php echo htmlspecialchars($detail, ENT_QUOTES, 'UTF-8'); ?></span></li>
                  <?php endforeach; ?>
                </ul>
                <div class="product-tags">
                  <?php foreach ($product['tags'] as $tag): ?>
                    <span><?php echo htmlspecialchars($tag, ENT_QUOTES, 'UTF-8'); ?></span>
                  <?php endforeach; ?>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="support-band">
      <div class="container">
        <div class="row mb-4">
          <div class="col-lg-7">
            <div class="section-kicker">One-stop support</div>
            <h2 class="section-title">More than product supply.</h2>
          </div>
          <div class="col-lg-5">
            <p class="section-copy">A&T Media also supports planning, design coordination, production setup, installation flow, and practical recommendations based on site use and visibility goals.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="support-card">
              <h3>Consultation</h3>
              <p>Discuss sign type, placement, size, materials, and brand objectives before production starts.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4">
            <div class="support-card">
              <h3>Artwork & Design</h3>
              <p>Refine artwork direction and practical layout choices for clear, durable signage output.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="support-card">
              <h3>Production</h3>
              <p>Coordinate fabrication, print finishing, and material preparation for consistent quality.</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="support-card">
              <h3>Installation</h3>
              <p>Complete on-site setup with practical attention to placement, finishing, and final presentation.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="cta">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-4 mb-lg-0">
            <div class="section-kicker">Get a quote</div>
            <h2 class="section-title mb-3">Need help choosing the right product?</h2>
            <p class="section-copy mb-0">Send your artwork, measurements, location, or installation needs and A&T Media can recommend the most suitable product route for your project.</p>
          </div>
          <div class="col-lg-4 offset-lg-1">
            <div class="contact-box">
              <p class="mb-3"><i class="fas fa-phone-alt mr-2 text-danger"></i><a href="tel:+60167013295">+60 16-701 3295</a></p>
              <p class="mb-3"><i class="fas fa-envelope mr-2 text-danger"></i><a href="mailto:antadv.rei@gmail.com">antadv.rei@gmail.com</a></p>
              <p class="mb-4"><i class="fas fa-map-marker-alt mr-2 text-danger"></i>16, Jalan Nilam 1/6, Taman Teknologi Tinggi Subang, 47500 Subang Jaya, Selangor, Malaysia.</p>
              <a class="btn btn-red btn-block" href="mailto:antadv.rei@gmail.com"><i class="fas fa-paper-plane mr-2"></i>Email Your Brief</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container d-flex flex-column flex-md-row justify-content-between align-items-md-center">
        <div><strong class="text-dark">A&T <span class="text-danger">Media</span></strong> | Signboard, signage and printing</div>
        <div class="mt-2 mt-md-0">Consulting, design, production, installation and evaluation.</div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
