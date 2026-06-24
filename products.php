<?php
require_once __DIR__ . '/includes/catalog.php';

$siteName = 'A&T Media Sdn. Bhd.';
$siteTitle = 'Products | A&T Media Sdn. Bhd. Signboard, Signage & Printing KL';
$siteDescription = 'Explore A&T Media products including 3D box up lettering, signboard, signage, printing, fabric lightbox, and standee signage solutions for Kuala Lumpur (KL), Klang Valley, Selangor, and Seremban.';
$siteKeywords = 'products signboard Kuala Lumpur, products signboard KL, 3D box up lettering, fabric lightbox, standee signage, signage products Klang Valley';
$siteUrl = 'http://signboardkl.com.my';
$canonicalUrl = rtrim($siteUrl, '/') . '/products.php';
$ogImage = rtrim($siteUrl, '/') . '/assets/signboardkl-hero.png';
$logoImage = rtrim($siteUrl, '/') . '/assets/ant-signage-logo.png';

$whatsAppUrl = 'https://wa.me/60167013295';

function productSlug(string $value): string
{
  return catalog_slug($value);
}

$catalog = catalog_load();
$categoryMap = catalog_category_map($catalog);
$categoryTree = catalog_build_category_tree($catalog);
$selectedCategoryId = (string) ($_GET['cat'] ?? '');
$selectedCategory = $categoryMap[$selectedCategoryId] ?? null;
$selectedCategoryPath = $selectedCategory ? catalog_category_path($categoryMap, $selectedCategoryId) : [];
$currentPage = max(1, (int) ($_GET['page'] ?? 1));
$perPage = 12;
$products = [];
foreach ($catalog['products'] as $item) {
  $item['id'] = $item['id'] ?? productSlug($item['title'] ?? 'product');
  $item['image'] = $item['image'] ?: CATALOG_DEFAULT_IMAGE;
  $item['summary'] = $item['description'] ?? '';
  $item['category'] = catalog_category_title($categoryMap, $item['category_id'] ?? '');
  $item['icon'] = $item['icon'] ?: 'fa-sign';
  $products[] = $item;
}

function categoryDescendantIds(array $catalog, string $categoryId): array
{
  $ids = [$categoryId];
  foreach ($catalog['categories'] as $category) {
    if (($category['parent_id'] ?? null) === $categoryId) {
      $ids = array_merge($ids, categoryDescendantIds($catalog, $category['id']));
    }
  }
  return $ids;
}

if ($selectedCategory) {
  $visibleCategoryIds = categoryDescendantIds($catalog, $selectedCategoryId);
  $products = array_values(array_filter($products, static function ($product) use ($visibleCategoryIds): bool {
    return in_array($product['category_id'] ?? '', $visibleCategoryIds, true);
  }));
}

$totalProducts = count($products);
$totalPages = max(1, (int) ceil($totalProducts / $perPage));
$currentPage = min($currentPage, $totalPages);
$productsPage = array_slice($products, ($currentPage - 1) * $perPage, $perPage);
$catalogHeading = $selectedCategory ? $selectedCategory['title'] : 'Featured Products';

function productListUrl(?string $categoryId = null, int $page = 1): string
{
  $params = [];
  if ($categoryId) {
    $params['cat'] = $categoryId;
  }
  if ($page > 1) {
    $params['page'] = $page;
  }
  $query = $params ? '?' . http_build_query($params) : '';
  return 'products.php' . $query . '#product-list';
}

function renderCategoryTree(array $items, ?string $selectedCategoryId, int $level = 0): void
{
  echo '<ul class="category-level category-level-' . $level . '">';
  foreach ($items as $item) {
    $title = $item['title'];
    $id = $item['id'];
    $activeClass = $selectedCategoryId === $id ? ' class="active"' : '';
    echo '<li>';
    echo '<a' . $activeClass . ' href="' . htmlspecialchars(productListUrl($id), ENT_QUOTES, 'UTF-8') . '">';
    echo '<i class="fas fa-angle-right" aria-hidden="true"></i>';
    echo '<span>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</span>';
    echo '</a>';
    if (!empty($item['children'])) {
      renderCategoryTree($item['children'], $selectedCategoryId, $level + 1);
    }
    echo '</li>';
  }
  echo '</ul>';
}

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

      .navbar-brand {
        color: var(--ink);
        font-weight: 800;
        letter-spacing: 0;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding-top: 0.2rem;
        padding-bottom: 0.2rem;
      }


      .navbar-brand span {
        font-size: 1.2rem;
        font-weight: 800;
        line-height: 1;
        color: var(--ink);
      }

      .navbar-brand .brand-accent {
        color: var(--brand-red);
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

      .product-nav-group + .product-nav-group {
        margin-top: 18px;
      }

      .product-nav-group-title {
        color: var(--muted);
        font-size: 0.78rem;
        font-weight: 800;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 8px;
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

      .product-overview {
        margin-bottom: 28px;
      }

      .product-overview-card {
        display: block;
        height: 100%;
        border: 1px solid var(--line);
        border-radius: 12px;
        background: #ffffff;
        padding: 22px;
        color: inherit;
        text-decoration: none;
        box-shadow: 0 14px 32px rgba(17, 17, 17, 0.04);
        transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease;
      }

      .product-overview-card:hover {
        color: inherit;
        text-decoration: none;
        transform: translateY(-4px);
        border-color: rgba(215, 25, 32, 0.35);
        box-shadow: 0 18px 38px rgba(17, 17, 17, 0.08);
      }

      .product-overview-card small {
        display: block;
        color: var(--muted);
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 10px;
      }

      .product-overview-card h3 {
        font-size: 1.05rem;
        font-weight: 800;
        margin-bottom: 10px;
      }

      .product-overview-card p {
        color: var(--muted);
        line-height: 1.65;
        margin-bottom: 0;
      }

      .product-group + .product-group {
        margin-top: 40px;
      }

      .product-group-header {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 14px;
        margin-bottom: 18px;
      }

      .product-group-header h3 {
        font-size: 1.5rem;
        font-weight: 850;
        margin-bottom: 0;
      }

      .product-group-header p {
        width: 100%;
        color: var(--muted);
        margin-bottom: 0;
      }

      .product-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 94px;
        padding: 8px 12px;
        border-radius: 999px;
        border: 1px solid var(--line);
        color: var(--graphite);
        font-size: 0.82rem;
        font-weight: 800;
        background: #ffffff;
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
        border-bottom: 1px solid var(--line);
        background: #ffffff;
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

      .catalog-section {
        padding: 42px 0 72px;
      }

      .category-panel {
        position: sticky;
        top: 92px;
        border: 1px solid var(--line);
        background: #ffffff;
      }

      .category-panel h2 {
        border-bottom: 1px solid var(--line);
        color: var(--ink);
        font-size: 1.1rem;
        font-weight: 850;
        margin: 0;
        padding: 18px 20px;
      }

      .category-level {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      .category-level-0 {
        padding: 10px 0;
      }

      .category-level li {
        margin: 0;
      }

      .category-level a {
        align-items: flex-start;
        color: var(--graphite);
        display: flex;
        font-size: 0.94rem;
        font-weight: 700;
        gap: 9px;
        line-height: 1.35;
        padding: 8px 20px;
        text-decoration: none;
      }

      .category-level-0 > li > a {
        text-transform: uppercase;
      }

      .category-level a:hover {
        color: var(--brand-red);
      }

      .category-level a.active {
        color: var(--brand-red);
        font-weight: 850;
      }

      .category-level i {
        color: #9a9a9a;
        font-size: 0.7rem;
        margin-top: 4px;
      }

      .category-level-1 a {
        color: #555555;
        font-size: 0.9rem;
        font-weight: 600;
        padding-left: 34px;
      }

      .category-level-2 a {
        color: #6d6d6d;
        font-size: 0.86rem;
        font-weight: 500;
        padding-left: 50px;
      }

      .catalog-heading {
        align-items: center;
        border-bottom: 1px solid var(--line);
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
        padding-bottom: 16px;
      }

      .catalog-heading h2 {
        font-size: 1.35rem;
        font-weight: 850;
        margin: 0;
      }

      .catalog-total {
        color: var(--muted);
        font-size: 0.92rem;
        font-weight: 700;
      }

      .product-card {
        border: 1px solid var(--line);
        background: #ffffff;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: border-color 160ms ease, transform 160ms ease;
      }

      .product-card:hover {
        border-color: rgba(215, 25, 32, 0.45);
        transform: translateY(-3px);
      }

      .product-image {
        aspect-ratio: 4 / 3;
        background: #111111;
        overflow: hidden;
        position: relative;
      }

      .product-image img {
        height: 100%;
        object-fit: cover;
        width: 100%;
      }

      .product-image .product-icon {
        background: rgba(215, 25, 32, 0.92);
        border-radius: 0;
        bottom: 0;
        color: #ffffff;
        height: 48px;
        position: absolute;
        right: 0;
        width: 48px;
      }

      .product-card-body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 18px;
      }

      .product-card small {
        color: var(--brand-red);
        display: block;
        font-weight: 800;
        margin-bottom: 8px;
      }

      .product-card h3 {
        color: var(--ink);
        font-size: 1.03rem;
        font-weight: 800;
        line-height: 1.35;
        margin-bottom: 10px;
      }

      .product-card p {
        color: var(--muted);
        font-size: 0.93rem;
        line-height: 1.6;
        margin-bottom: 18px;
      }

      .product-card .btn {
        margin-top: auto;
      }

      .product-detail-link {
        color: inherit;
        display: flex;
        flex: 1;
        flex-direction: column;
        text-decoration: none;
      }

      .product-detail-link:hover {
        color: inherit;
        text-decoration: none;
      }

      .catalog-pagination {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 18px;
      }

      .catalog-pagination a,
      .catalog-pagination span {
        border: 1px solid var(--line);
        color: var(--graphite);
        font-weight: 800;
        min-width: 40px;
        padding: 9px 12px;
        text-align: center;
        text-decoration: none;
      }

      .catalog-pagination .active,
      .catalog-pagination a:hover {
        background: var(--brand-red);
        border-color: var(--brand-red);
        color: #ffffff;
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

      @media (max-width: 991.98px) {
        .product-nav,
        .category-panel {
          position: static;
          margin-bottom: 28px;
        }
      }

      @media (max-width: 575.98px) {
        .navbar-brand {
          gap: 10px;
        }

        .navbar-brand span {
          font-size: 1rem;
        }

        .page-hero-content {
          padding: 72px 0 78px;
        }

        .page-title h1 {
          font-size: 1.75rem;
        }

        section {
          padding: 56px 0;
        }

        .catalog-section {
          padding: 34px 0 56px;
        }

        .catalog-heading {
          align-items: flex-start;
          flex-direction: column;
          gap: 8px;
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
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item ml-lg-3"><a class="btn btn-red px-4" href="contact.php"><i class="fas fa-phone-alt mr-2"></i>Get Quote</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="page-title">
      <div class="container">
        <h1>Our Products</h1>
      </div>
    </header>

    <div class="breadcrumb-bar">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <?php if ($selectedCategoryPath): ?>
              <li class="breadcrumb-item"><a href="products.php">Our Products</a></li>
              <?php foreach ($selectedCategoryPath as $index => $category): ?>
                <?php $isLastCategory = $index === array_key_last($selectedCategoryPath); ?>
                <?php if ($isLastCategory): ?>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?></li>
                <?php else: ?>
                  <li class="breadcrumb-item"><a href="products.php?cat=<?php echo rawurlencode($category['id']); ?>#product-list"><?php echo htmlspecialchars($category['title'], ENT_QUOTES, 'UTF-8'); ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php else: ?>
              <li class="breadcrumb-item active" aria-current="page">Our Products</li>
            <?php endif; ?>
          </ol>
        </nav>
      </div>
    </div>

    <section id="product-list" class="catalog-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-xl-3">
            <aside class="category-panel" aria-label="Product category navigation">
              <h2>Category</h2>
              <ul class="category-level category-level-0">
                <li>
                  <a<?php echo $selectedCategory ? '' : ' class="active"'; ?> href="<?php echo htmlspecialchars(productListUrl(null), ENT_QUOTES, 'UTF-8'); ?>">
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span>All Products</span>
                  </a>
                </li>
              </ul>
              <?php renderCategoryTree($categoryTree, $selectedCategoryId); ?>
            </aside>
          </div>
          <div class="col-lg-8 col-xl-9">
            <div class="catalog-heading">
              <h2><?php echo htmlspecialchars($catalogHeading, ENT_QUOTES, 'UTF-8'); ?></h2>
              <div class="catalog-total">
                <?php echo $totalProducts; ?> products<?php echo $totalPages > 1 ? ' · Page ' . $currentPage . ' of ' . $totalPages : ''; ?>
              </div>
            </div>
            <div class="row">
              <?php if (!$productsPage): ?>
                <div class="col-12">
                  <div class="alert alert-light border">No products found in this category.</div>
                </div>
              <?php endif; ?>
              <?php foreach ($productsPage as $product): ?>
                <div class="col-md-6 col-xl-4 mb-4">
                  <article id="<?php echo htmlspecialchars($product['id'], ENT_QUOTES, 'UTF-8'); ?>" class="product-card">
                    <a class="product-detail-link" href="product.php?id=<?php echo rawurlencode($product['id']); ?>">
                      <div class="product-image">
                        <img src="<?php echo htmlspecialchars($product['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="product-icon"><i class="fas <?php echo htmlspecialchars($product['icon'], ENT_QUOTES, 'UTF-8'); ?>" aria-hidden="true"></i></div>
                      </div>
                      <div class="product-card-body">
                        <small><?php echo htmlspecialchars($product['category'], ENT_QUOTES, 'UTF-8'); ?></small>
                        <h3><?php echo htmlspecialchars($product['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                      </div>
                    </a>
                    <div class="product-card-body pt-0">
                      <a class="btn btn-red btn-sm" href="<?php echo htmlspecialchars($whatsAppUrl, ENT_QUOTES, 'UTF-8'); ?>">
                        <i class="fab fa-whatsapp mr-1" aria-hidden="true"></i> WhatsApp Us
                      </a>
                    </div>
                  </article>
                </div>
              <?php endforeach; ?>
            </div>
            <?php if ($totalPages > 1): ?>
              <nav class="catalog-pagination" aria-label="Product pages">
                <?php if ($currentPage > 1): ?>
                  <a href="<?php echo htmlspecialchars(productListUrl($selectedCategoryId ?: null, $currentPage - 1), ENT_QUOTES, 'UTF-8'); ?>">Prev</a>
                <?php endif; ?>
                <?php for ($page = 1; $page <= $totalPages; $page++): ?>
                  <?php if ($page === $currentPage): ?>
                    <span class="active"><?php echo $page; ?></span>
                  <?php else: ?>
                    <a href="<?php echo htmlspecialchars(productListUrl($selectedCategoryId ?: null, $page), ENT_QUOTES, 'UTF-8'); ?>"><?php echo $page; ?></a>
                  <?php endif; ?>
                <?php endfor; ?>
                <?php if ($currentPage < $totalPages): ?>
                  <a href="<?php echo htmlspecialchars(productListUrl($selectedCategoryId ?: null, $currentPage + 1), ENT_QUOTES, 'UTF-8'); ?>">Next</a>
                <?php endif; ?>
              </nav>
            <?php endif; ?>
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
              <a class="btn btn-red btn-block" href="contact.php"><i class="fas fa-paper-plane mr-2"></i>Send Your Brief</a>
            </div>
          </div>
        </div>
      </div>
    </section>

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
