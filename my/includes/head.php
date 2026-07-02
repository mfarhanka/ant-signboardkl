<?php
$metaRobots = $metaRobots ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
$ogType = $ogType ?? 'website';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?></title>
<?php if (!empty($siteDescription)): ?><meta name="description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($siteKeywords)): ?><meta name="keywords" content="<?php echo htmlspecialchars($siteKeywords, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($metaRobots)): ?><meta name="robots" content="<?php echo htmlspecialchars($metaRobots, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($siteName)): ?><meta name="author" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<meta name="theme-color" content="#d71920">
<?php if (!empty($canonicalUrl)): ?><link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($logoImage)): ?><link rel="icon" type="image/png" href="<?php echo htmlspecialchars($logoImage, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<meta property="og:locale" content="ms_MY">
<meta property="og:type" content="<?php echo htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
<?php if (!empty($siteDescription)): ?><meta property="og:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($canonicalUrl)): ?><meta property="og:url" content="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($siteName)): ?><meta property="og:site_name" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($ogImage)): ?><meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($ogImageAlt)): ?><meta property="og:image:alt" content="<?php echo htmlspecialchars($ogImageAlt, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8'); ?>">
<?php if (!empty($siteDescription)): ?><meta name="twitter:description" content="<?php echo htmlspecialchars($siteDescription, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php if (!empty($ogImage)): ?><meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>"><?php endif; ?>
<?php require __DIR__ . '/ga4.php'; ?>
<link rel="preconnect" href="https://stackpath.bootstrapcdn.com">
<link rel="preconnect" href="https://cdnjs.cloudflare.com">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<?php if (!empty($structuredData)): ?><script type="application/ld+json"><?php echo json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script><?php endif; ?>
