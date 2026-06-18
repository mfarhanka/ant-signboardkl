<?php
declare(strict_types=1);

const CATALOG_DATA_FILE = __DIR__ . '/../data/catalog.json';
const CATALOG_DEFAULT_IMAGE = 'assets/signboardkl-hero.png';

function catalog_slug(string $value): string
{
  $slug = strtolower((string) preg_replace('/[^a-z0-9]+/i', '-', $value));
  return trim($slug, '-') ?: 'item';
}

function catalog_id(string $prefix = 'item'): string
{
  return $prefix . '-' . bin2hex(random_bytes(5));
}

function catalog_seed_data(): array
{
  $categoryTree = [
    [
      'title' => '3D Box Up Lettering',
      'children' => ['Acrylic Lettering', 'Aluminium / Acrylic', 'Aluminium Lettering', 'Stainless Steel'],
    ],
    [
      'title' => 'Signboard',
      'children' => [
        ['title' => '3D Lighting Signboard', 'children' => ['Back-Lit Signboard', 'Front-Lit Signboard']],
        ['title' => '3D Non-Lighting Signboard', 'children' => ['Aluminium Box Up', 'PVC Foamboard 3D Wording', 'Stainless Steel Box Up']],
        ['title' => 'Lightbox', 'children' => ['Soft Fabric Lightbox']],
        ['title' => 'Normal Signboard', 'children' => ['Aluminium Strip Signboard Base']],
      ],
    ],
    [
      'title' => 'Signage',
      'children' => [
        ['title' => 'Billboard & Hoarding', 'children' => ['Construction Board']],
        ['title' => 'Indoor Signage', 'children' => ['Acrylic 3D Signage', 'Acrylic Signage', 'Foamboard', 'Stainless Steel Signage']],
        'LED Banner / Display / Neon',
        'Pylon & Directional Signage',
        ['title' => 'Road Sign', 'children' => ['JKR Roadsign', 'Normal Roadsign']],
      ],
    ],
    [
      'title' => 'Printing',
      'children' => [
        ['title' => 'Display Set', 'children' => ['Wood Easel Stand']],
        ['title' => 'Exhibition Booth', 'children' => ['Backdrop Display Set', 'Normal Roll Up Bunting']],
        ['title' => 'Sticker Service', 'children' => ['Wall Sticker']],
      ],
    ],
    ['title' => 'Fabric Lightbox'],
    ['title' => 'Standee Signage'],
  ];

  $categories = [];
  $categoryIdsByTitle = [];
  $addCategory = static function ($item, ?string $parentId = null) use (&$addCategory, &$categories, &$categoryIdsByTitle): void {
    $title = is_array($item) ? $item['title'] : $item;
    $baseId = catalog_slug($title);
    $id = $baseId;
    $counter = 2;
    while (isset($categories[$id])) {
      $id = $baseId . '-' . $counter;
      $counter++;
    }

    $categories[$id] = [
      'id' => $id,
      'title' => $title,
      'parent_id' => $parentId,
      'seo_title' => '',
      'seo_keywords' => '',
      'meta_description' => '',
      'sort_order' => count($categories) + 1,
    ];
    $categoryIdsByTitle[$title] = $id;

    if (is_array($item) && !empty($item['children'])) {
      foreach ($item['children'] as $child) {
        $addCategory($child, $id);
      }
    }
  };

  foreach ($categoryTree as $item) {
    $addCategory($item);
  }

  $seedProducts = [
    ['title' => 'HIPPO LAUNDRY 3D Lettering Signboard', 'category' => '3D Box Up Lettering', 'icon' => 'fa-font'],
    ['title' => '3D Box up Lettering Back-lit', 'category' => 'Back-Lit Signboard', 'icon' => 'fa-lightbulb'],
    ['title' => 'Acrylic 3D Lettering and Diecut Black Sticker', 'category' => 'Acrylic Lettering', 'icon' => 'fa-cut'],
    ['title' => '3D Stainless Steel Lettering', 'category' => 'Stainless Steel', 'icon' => 'fa-industry'],
    ['title' => 'Day or Night, Make Your Brand Shine!', 'category' => '3D Lighting Signboard', 'icon' => 'fa-store'],
    ['title' => 'Aluminum Strip with 3D Box-Up Frontlit', 'category' => 'Front-Lit Signboard', 'icon' => 'fa-sign'],
    ['title' => 'Fabric lightbox double sided', 'category' => 'Lightbox', 'icon' => 'fa-border-style'],
    ['title' => '3D Lettering Signboard', 'category' => 'Normal Signboard', 'icon' => 'fa-store-alt'],
    ['title' => 'Billboard and construction Board at Site', 'category' => 'Billboard & Hoarding', 'icon' => 'fa-map-signs'],
    ['title' => 'Banner Billboard', 'category' => 'Printing', 'icon' => 'fa-print'],
    ['title' => 'Wall Sticker', 'category' => 'Sticker Service', 'icon' => 'fa-sticky-note'],
    ['title' => 'Sticker Services', 'category' => 'Wall Sticker', 'icon' => 'fa-layer-group'],
  ];

  $products = [];
  foreach ($seedProducts as $index => $product) {
    $id = catalog_slug($product['title']);
    $products[] = [
      'id' => $id,
      'title' => $product['title'],
      'description' => 'Custom-made signage and display work by A&T Media, ready for enquiry, site measurement, artwork discussion, and production planning.',
      'category_id' => $categoryIdsByTitle[$product['category']] ?? '',
      'image' => CATALOG_DEFAULT_IMAGE,
      'icon' => $product['icon'],
      'seo_title' => '',
      'seo_keywords' => '',
      'meta_description' => '',
      'sort_order' => $index + 1,
    ];
  }

  return [
    'categories' => array_values($categories),
    'products' => $products,
  ];
}

function catalog_load(): array
{
  if (!is_file(CATALOG_DATA_FILE)) {
    $catalog = catalog_seed_data();
    catalog_save($catalog);
    return $catalog;
  }

  $decoded = json_decode((string) file_get_contents(CATALOG_DATA_FILE), true);
  if (!is_array($decoded)) {
    return catalog_seed_data();
  }

  $decoded['categories'] = array_values($decoded['categories'] ?? []);
  $decoded['products'] = array_values($decoded['products'] ?? []);
  return $decoded;
}

function catalog_save(array $catalog): void
{
  $dir = dirname(CATALOG_DATA_FILE);
  if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
  }
  file_put_contents(CATALOG_DATA_FILE, json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), LOCK_EX);
}

function catalog_category_map(array $catalog): array
{
  $map = [];
  foreach ($catalog['categories'] as $category) {
    $map[$category['id']] = $category;
  }
  return $map;
}

function catalog_category_title(array $categoryMap, string $categoryId): string
{
  return $categoryMap[$categoryId]['title'] ?? 'Uncategorized';
}

function catalog_category_options(array $catalog, ?string $excludeId = null, ?string $parentId = null, int $level = 0): array
{
  $options = [];
  foreach ($catalog['categories'] as $category) {
    if (($category['parent_id'] ?? null) !== $parentId || $category['id'] === $excludeId) {
      continue;
    }
    $options[] = [
      'id' => $category['id'],
      'title' => str_repeat('-- ', $level) . $category['title'],
    ];
    $options = array_merge($options, catalog_category_options($catalog, $excludeId, $category['id'], $level + 1));
  }
  return $options;
}

function catalog_build_category_tree(array $catalog, ?string $parentId = null): array
{
  $tree = [];
  foreach ($catalog['categories'] as $category) {
    if (($category['parent_id'] ?? null) !== $parentId) {
      continue;
    }
    $children = catalog_build_category_tree($catalog, $category['id']);
    $node = ['id' => $category['id'], 'title' => $category['title']];
    if ($children) {
      $node['children'] = $children;
    }
    $tree[] = $node;
  }
  return $tree;
}

function catalog_find_index(array $items, string $id): ?int
{
  foreach ($items as $index => $item) {
    if (($item['id'] ?? '') === $id) {
      return $index;
    }
  }
  return null;
}
