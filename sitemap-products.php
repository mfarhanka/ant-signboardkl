<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/catalog.php';

$siteUrl = 'http://signboardkl.com.my';
$baseUrl = rtrim($siteUrl, '/');
$catalog = catalog_load();

header('Content-Type: application/xml; charset=UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
  xmlns:xhtml="http://www.w3.org/1999/xhtml">
<?php foreach ($catalog['products'] as $product): ?>
<?php
  $productId = (string) ($product['id'] ?? '');
  if ($productId === '') {
    continue;
  }

  $englishUrl = $baseUrl . '/product.php?id=' . rawurlencode($productId);
  $malayUrl = $baseUrl . '/my/product.php?id=' . rawurlencode($productId);
?>
  <url>
    <loc><?php echo htmlspecialchars($englishUrl, ENT_XML1, 'UTF-8'); ?></loc>
    <xhtml:link rel="alternate" hreflang="en-MY" href="<?php echo htmlspecialchars($englishUrl, ENT_XML1, 'UTF-8'); ?>" />
    <xhtml:link rel="alternate" hreflang="ms-MY" href="<?php echo htmlspecialchars($malayUrl, ENT_XML1, 'UTF-8'); ?>" />
    <xhtml:link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($englishUrl, ENT_XML1, 'UTF-8'); ?>" />
    <lastmod>2026-07-02</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc><?php echo htmlspecialchars($malayUrl, ENT_XML1, 'UTF-8'); ?></loc>
    <xhtml:link rel="alternate" hreflang="en-MY" href="<?php echo htmlspecialchars($englishUrl, ENT_XML1, 'UTF-8'); ?>" />
    <xhtml:link rel="alternate" hreflang="ms-MY" href="<?php echo htmlspecialchars($malayUrl, ENT_XML1, 'UTF-8'); ?>" />
    <xhtml:link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($englishUrl, ENT_XML1, 'UTF-8'); ?>" />
    <lastmod>2026-07-02</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
<?php endforeach; ?>
</urlset>
