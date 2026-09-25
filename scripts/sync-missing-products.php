<?php
declare(strict_types=1);

const SOURCE_BASE = 'https://www.antsignage.com';

$root = dirname(__DIR__);
$catalogPath = $root . '/data/catalog.json';
$imageDir = $root . '/uploads/products';

$categorySources = [
    'acrylic-lettering' => '513577', 'aluminium-acrylic' => '513573',
    'aluminium-lettering' => '513572', 'stainless-steel' => '513574',
    'back-lit-signboard' => '490255', 'front-lit-signboard' => '473451',
    'aluminium-box-up' => '494251', 'pvc-foamboard-3d-wording' => '473458',
    'stainless-steel-box-up' => '494253', 'soft-fabric-lightbox' => '473474',
    'aluminium-strip-signboard-base' => '473472', 'construction-board' => '473488',
    'acrylic-3d-signage' => '473481', 'acrylic-signage' => '490132',
    'foamboard' => '536988', 'stainless-steel-signage' => '492298',
    'led-banner-display-neon' => '473483', 'pylon-directional-signage' => '473484',
    'jkr-roadsign' => '473501', 'normal-roadsign' => '490171',
    'wood-easel-stand' => '473555', 'backdrop-display-set' => '490193',
    'normal-roll-up-bunting' => '473553', 'wall-sticker' => '473549',
    'fabric-lightbox' => '653255', 'standee-signage' => '654668',
    '3d-box-up-lettering' => '513571', '3d-lighting-signboard' => '473450',
    '3d-non-lighting-signboard' => '473457', 'lightbox' => '473473',
    'normal-signboard' => '473471', 'billboard-hoarding' => '473487',
    'indoor-signage' => '473480', 'road-sign' => '473499',
    'display-set' => '473554', 'exhibition-booth' => '473552',
    'sticker-service' => '473548', 'signboard' => '473449',
    'signage' => '473477', 'printing' => '473547',
];

function fetchUrl(string $url): string
{
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTPHEADER => [
            'Cookie: np_js_c=1',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/140 Safari/537.36',
        ],
    ]);
    $body = curl_exec($curl);
    $status = (int) curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    $error = curl_error($curl);
    curl_close($curl);
    if (!is_string($body) || $status >= 400) {
        throw new RuntimeException("Unable to fetch {$url}: HTTP {$status} {$error}");
    }
    return $body;
}

function loadHtml(string $html): DOMXPath
{
    $document = new DOMDocument();
    libxml_use_internal_errors(true);
    $document->loadHTML($html, LIBXML_NOERROR | LIBXML_NOWARNING);
    libxml_clear_errors();
    return new DOMXPath($document);
}

function slug(string $value): string
{
    $value = strtolower(trim($value));
    $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?: 'product';
    return trim($value, '-');
}

function normalizedTitle(string $value): string
{
    return trim(preg_replace('/[^a-z0-9]+/', ' ', strtolower($value)) ?? '');
}

function scrapeCategory(string $categoryId, string $sourceCid): array
{
    $products = [];
    for ($page = 1; $page <= 25; $page++) {
        $suffix = $page === 1 ? '' : "pn/{$page}/";
        $url = SOURCE_BASE . "/ourproducts/cid/{$sourceCid}/{$suffix}";
        $xpath = loadHtml(fetchUrl($url));
        $nodes = $xpath->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' img_frame ') and @data-product-id]");
        if (!$nodes || $nodes->length === 0) {
            break;
        }
        $pageIds = [];
        foreach ($nodes as $node) {
            $sourceId = trim($node->getAttribute('data-product-id'));
            if ($sourceId === '' || isset($pageIds[$sourceId])) {
                continue;
            }
            $pageIds[$sourceId] = true;
            $anchor = $xpath->query(".//a[contains(@href, '/showproducts/productid/')]", $node)?->item(0);
            $image = $xpath->query('.//img', $node)?->item(0);
            if (!$anchor instanceof DOMElement || !$image instanceof DOMElement) {
                continue;
            }
            $title = trim(html_entity_decode($image->getAttribute('alt'), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $href = $anchor->getAttribute('href');
            $imageUrl = html_entity_decode($image->getAttribute('src'), ENT_QUOTES | ENT_HTML5, 'UTF-8');
            if ($title === '' || $imageUrl === '') {
                continue;
            }
            $products[$sourceId] = [
                'source_id' => $sourceId,
                'title' => $title,
                'category_id' => $categoryId,
                'source_url' => str_starts_with($href, 'http') ? $href : SOURCE_BASE . '/' . ltrim($href, '/'),
                'image_url' => $imageUrl,
            ];
        }
        $nextPath = "/ourproducts/cid/{$sourceCid}/pn/" . ($page + 1) . '/';
        $hasNext = $xpath->query("//a[contains(@href, '{$nextPath}')]")?->length > 0;
        if (!$hasNext) {
            break;
        }
    }
    return $products;
}

function downloadImage(string $url, string $path): void
{
    $curl = curl_init($url);
    $handle = fopen($path, 'wb');
    if (!$handle) {
        throw new RuntimeException("Unable to create image {$path}");
    }
    curl_setopt_array($curl, [
        CURLOPT_FILE => $handle,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 45,
        CURLOPT_REFERER => SOURCE_BASE . '/ourproducts/',
        CURLOPT_HTTPHEADER => ['Cookie: np_js_c=1', 'User-Agent: Mozilla/5.0'],
    ]);
    $ok = curl_exec($curl);
    $status = (int) curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    $error = curl_error($curl);
    curl_close($curl);
    fclose($handle);
    if (!$ok || $status >= 400 || !is_file($path) || filesize($path) === 0) {
        @unlink($path);
        throw new RuntimeException("Unable to download {$url}: HTTP {$status} {$error}");
    }
}

$catalog = json_decode((string) file_get_contents($catalogPath), true, 512, JSON_THROW_ON_ERROR);
$sourceProducts = [];
foreach ($categorySources as $categoryId => $sourceCid) {
    foreach (scrapeCategory($categoryId, $sourceCid) as $sourceId => $product) {
        // Categories are ordered deepest-first, so keep the most specific assignment.
        $sourceProducts[$sourceId] ??= $product;
    }
    fwrite(STDOUT, "Audited {$categoryId}\n");
}

$existingBySource = [];
$existingByTitle = [];
foreach ($catalog['products'] as $index => $product) {
    if (!empty($product['source_id'])) {
        $existingBySource[(string) $product['source_id']] = $index;
    }
    $existingByTitle[normalizedTitle((string) ($product['title'] ?? ''))][] = $index;
}

$added = 0;
$updated = 0;
$usedIds = array_fill_keys(array_column($catalog['products'], 'id'), true);
foreach ($sourceProducts as $sourceId => $source) {
    $index = $existingBySource[$sourceId] ?? null;
    if ($index === null) {
        $matches = $existingByTitle[normalizedTitle($source['title'])] ?? [];
        $unlinked = array_values(array_filter($matches, static fn(int $i): bool => empty($catalog['products'][$i]['source_id'])));
        if (count($unlinked) === 1) {
            $index = $unlinked[0];
        }
    }
    if ($index !== null) {
        $changed = false;
        foreach (['category_id', 'source_id', 'source_url'] as $field) {
            $value = $field === 'source_id' ? $sourceId : $source[$field];
            if (($catalog['products'][$index][$field] ?? null) !== $value) {
                $catalog['products'][$index][$field] = $value;
                $changed = true;
            }
        }
        if ($changed) {
            $updated++;
        }
        $existingBySource[$sourceId] = $index;
        continue;
    }

    $baseId = slug($source['title']);
    $id = $baseId;
    if (isset($usedIds[$id])) {
        $id .= '-' . $sourceId;
    }
    $usedIds[$id] = true;
    $extension = 'webp';
    $imageName = $id . '.' . $extension;
    downloadImage($source['image_url'], $imageDir . '/' . $imageName);
    $categoryTitle = '';
    foreach ($catalog['categories'] as $category) {
        if (($category['id'] ?? '') === $source['category_id']) {
            $categoryTitle = (string) ($category['title'] ?? 'signage');
            break;
        }
    }
    $description = $source['title'] . ' by A&T Media. Contact us for material recommendations, artwork planning, fabrication, delivery, and installation details.';
    $catalog['products'][] = [
        'id' => $id,
        'title' => $source['title'],
        'description' => $description,
        'category_id' => $source['category_id'],
        'image' => 'uploads/products/' . $imageName,
        'icon' => 'fa-sign',
        'seo_title' => $source['title'],
        'seo_keywords' => strtolower($categoryTitle) . ', signage KL, signboard Kuala Lumpur',
        'meta_description' => $description,
        'sort_order' => count($catalog['products']) + 1,
        'source_id' => $sourceId,
        'source_url' => $source['source_url'],
    ];
    $added++;
}

file_put_contents(
    $catalogPath,
    json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . PHP_EOL,
    LOCK_EX
);
fwrite(STDOUT, "Source products: " . count($sourceProducts) . "; added: {$added}; updated: {$updated}; total: " . count($catalog['products']) . PHP_EOL);
