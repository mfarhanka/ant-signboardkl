<?php
declare(strict_types=1);

function catalog_ms_category_titles(): array
{
  return [
    '3d-box-up-lettering' => 'Huruf Timbul 3D',
    'acrylic-lettering' => 'Huruf Akrilik',
    'aluminium-acrylic' => 'Aluminium / Akrilik',
    'aluminium-lettering' => 'Huruf Aluminium',
    'stainless-steel' => 'Keluli Tahan Karat',
    'signboard' => 'Papan Tanda',
    '3d-lighting-signboard' => 'Papan Tanda 3D Bercahaya',
    'back-lit-signboard' => 'Papan Tanda Cahaya Belakang',
    'front-lit-signboard' => 'Papan Tanda Cahaya Hadapan',
    '3d-non-lighting-signboard' => 'Papan Tanda 3D Tanpa Lampu',
    'aluminium-box-up' => 'Kotak Timbul Aluminium',
    'pvc-foamboard-3d-wording' => 'Tulisan 3D Papan Busa PVC',
    'stainless-steel-box-up' => 'Kotak Timbul Keluli Tahan Karat',
    'lightbox' => 'Kotak Lampu',
    'soft-fabric-lightbox' => 'Kotak Lampu Fabrik Lembut',
    'normal-signboard' => 'Papan Tanda Biasa',
    'aluminium-strip-signboard-base' => 'Tapak Papan Tanda Jalur Aluminium',
    'signage' => 'Sistem Papan Tanda',
    'billboard-hoarding' => 'Papan Iklan & Penghadang',
    'construction-board' => 'Papan Pembinaan',
    'indoor-signage' => 'Papan Tanda Dalaman',
    'acrylic-3d-signage' => 'Papan Tanda Akrilik 3D',
    'acrylic-signage' => 'Papan Tanda Akrilik',
    'foamboard' => 'Papan Busa',
    'stainless-steel-signage' => 'Papan Tanda Keluli Tahan Karat',
    'led-banner-display-neon' => 'Sepanduk / Paparan / Neon LED',
    'pylon-directional-signage' => 'Papan Tanda Pilon & Arah',
    'road-sign' => 'Papan Tanda Jalan',
    'jkr-roadsign' => 'Papan Tanda Jalan JKR',
    'normal-roadsign' => 'Papan Tanda Jalan Biasa',
    'printing' => 'Percetakan',
    'display-set' => 'Set Paparan',
    'wood-easel-stand' => 'Penyangga Kayu',
    'exhibition-booth' => 'Reruai Pameran',
    'backdrop-display-set' => 'Set Paparan Latar Belakang',
    'normal-roll-up-bunting' => 'Bunting Gulung Biasa',
    'sticker-service' => 'Perkhidmatan Pelekat',
    'wall-sticker' => 'Pelekat Dinding',
    'fabric-lightbox' => 'Kotak Lampu Fabrik',
    'standee-signage' => 'Papan Tanda Berdiri',
  ];
}

function catalog_ms_product_title(string $title): string
{
  $special = [
    'Stand Out from Every Angle!' => 'Menyerlah dari Setiap Sudut!',
    'Transform Your Retail Space with Custom Wall Wraps!' => 'Ubah Ruang Runcit Anda dengan Pelekat Dinding Tersuai!',
    'Make Your Brand Stand Out in 3D!' => 'Jadikan Jenama Anda Menyerlah dalam Bentuk 3D!',
    'Keep Your Reserved Spaces Clear!' => 'Pastikan Ruang Simpanan Anda Tidak Dihalang!',
    'Bring Your Retail Space to Life!' => 'Ceriakan Ruang Runcit Anda!',
    'Day or Night, Make Your Brand Shine!' => 'Siang atau Malam, Serlahkan Jenama Anda!',
    "Elevate Your Boutique's Interior with Premium Signage like MASTER PIECE TAILORS!" => 'Tingkatkan Ruang Dalaman Butik dengan Papan Tanda Premium seperti MASTER PIECE TAILORS!',
    "Spice Up Your Restaurant's Interior!" => 'Serikan Ruang Dalaman Restoran Anda!',
    'Guide Hungry Customers to Your Door!' => 'Bimbing Pelanggan ke Pintu Kedai Anda!',
    'Professional Office Branding!' => 'Penjenamaan Pejabat Profesional!',
  ];
  if (isset($special[$title])) {
    return $special[$title];
  }

  $replacements = [
    'Day or Night, Make Your Brand Shine!' => 'Siang atau Malam, Serlahkan Jenama Anda!',
    'Stainless Steel (Hairline)' => 'Keluli Tahan Karat (Kemasan Garis Halus)',
    'Stainless Steel Mirror Gold' => 'Keluli Tahan Karat Cermin Emas',
    'Stainless Steel Mirror' => 'Keluli Tahan Karat Cermin',
    'Stainless Steel' => 'Keluli Tahan Karat',
    'Aluminium Strip Signboard Base' => 'Tapak Papan Tanda Jalur Aluminium',
    'Aluminum Strip with' => 'Jalur Aluminium dengan',
    'Aluminium Strip With' => 'Jalur Aluminium dengan',
    'Glass Window Sticker (Transparent Sticker)' => 'Pelekat Tingkap Kaca (Pelekat Lutsinar)',
    'Glass Window Sticker (Frosted Sticker)' => 'Pelekat Tingkap Kaca (Pelekat Kabur)',
    'Frosted Sticker (Glass Window)' => 'Pelekat Kabur (Tingkap Kaca)',
    'Wall Sticker and Glass Window Sticker' => 'Pelekat Dinding dan Pelekat Tingkap Kaca',
    'Wrapping Sticker Wallpaper Services' => 'Perkhidmatan Balutan Pelekat Kertas Dinding',
    'Wrapping Glass Sticker Services' => 'Perkhidmatan Balutan Pelekat Kaca',
    'Pylon & Directional Signage' => 'Papan Tanda Pilon & Arah',
    'Roadsign / Direction Signage' => 'Papan Tanda Jalan / Arah',
    'Billboard and construction Board at Site' => 'Papan Iklan dan Papan Pembinaan di Tapak',
    'Billboard & Hoarding' => 'Papan Iklan & Penghadang',
    'LED Banner / LED Display' => 'Sepanduk LED / Paparan LED',
    'LED BANNER / LED DISPLAY / LED NEON' => 'SEPANDUK LED / PAPARAN LED / NEON LED',
    'Soft Fabric Lightbox' => 'Kotak Lampu Fabrik Lembut',
    'Fabric lightbox double sided' => 'Kotak Lampu Fabrik Dua Muka',
    'High Quality Fabric Lightbox' => 'Kotak Lampu Fabrik Berkualiti Tinggi',
    'Double-sided Lightbox' => 'Kotak Lampu Dua Muka',
    'Aluminium Casing Lightbox' => 'Kotak Lampu Bingkai Aluminium',
    'Lightbox Signboard' => 'Papan Tanda Kotak Lampu',
    'Round Shape Lightbox' => 'Kotak Lampu Bentuk Bulat',
    'Normal Lightbox' => 'Kotak Lampu Biasa',
    'Light Box' => 'Kotak Lampu',
    'Lightbox' => 'Kotak Lampu',
    '3D Box Up Lettering' => 'Huruf Timbul 3D',
    '3D Box-up Lettering' => 'Huruf Timbul 3D',
    '3D Box up Lettering' => 'Huruf Timbul 3D',
    '3D Box-Up' => 'Kotak Timbul 3D',
    '3D Box-up' => 'Kotak Timbul 3D',
    '3D Box Up' => 'Kotak Timbul 3D',
    'Box-Up' => 'Kotak Timbul',
    'Box-up' => 'Kotak Timbul',
    'Box Up' => 'Kotak Timbul',
    'box up' => 'kotak timbul',
    '3D Lettering' => 'Huruf 3D',
    '3D Wording' => 'Tulisan 3D',
    'Lettering' => 'Huruf',
    'Wording' => 'Tulisan',
    'Front-lit' => 'Cahaya Hadapan',
    'Front lit' => 'Cahaya Hadapan',
    'Frontlit' => 'Cahaya Hadapan',
    'Back-lit' => 'Cahaya Belakang',
    'Back lit' => 'Cahaya Belakang',
    'Backlit' => 'Cahaya Belakang',
    'Whole-lit' => 'Bercahaya Penuh',
    'Non-Lighting' => 'Tanpa Lampu',
    'Without Lighting' => 'Tanpa Lampu',
    'Lighting' => 'Bercahaya',
    'Acrylic' => 'Akrilik',
    'Foamboard' => 'Papan Busa',
    'Construction Board' => 'Papan Pembinaan',
    'Hoarding' => 'Penghadang',
    'Billboard' => 'Papan Iklan',
    'Signboard' => 'Papan Tanda',
    'Directional Signage' => 'Papan Tanda Arah',
    'Direction signage' => 'Papan Tanda Arah',
    'Indoor Signage' => 'Papan Tanda Dalaman',
    'Room Signage' => 'Papan Tanda Bilik',
    'Safety Signage' => 'Papan Tanda Keselamatan',
    'Information Signage' => 'Papan Tanda Maklumat',
    'Neon Signage' => 'Papan Tanda Neon',
    'Signage' => 'Papan Tanda',
    'Information Roadsign' => 'Papan Tanda Jalan Maklumat',
    'Directional Roadsign' => 'Papan Tanda Jalan Arah',
    'Notice Roadsign' => 'Papan Tanda Jalan Notis',
    'Safety Roadsign' => 'Papan Tanda Jalan Keselamatan',
    'Property Roadsign' => 'Papan Tanda Jalan Hartanah',
    'Advertising Road Sign' => 'Papan Tanda Jalan Pengiklanan',
    'Road Sign' => 'Papan Tanda Jalan',
    'Roadsign' => 'Papan Tanda Jalan',
    'Parking Sign' => 'Papan Tanda Tempat Letak Kereta',
    'Entrance' => 'Pintu Masuk',
    'Advertising' => 'Pengiklanan',
    'Professional Office Branding' => 'Penjenamaan Pejabat Profesional',
    'Office Tower' => 'Menara Pejabat',
    'Fire Extinguisher' => 'Alat Pemadam Api',
    'Festival Arch' => 'Gerbang Festival',
    'Double Sided' => 'Dua Muka',
    'Banner' => 'Sepanduk',
    'Printing' => 'Percetakan',
    'Exhibition Booth' => 'Reruai Pameran',
    'EXHIBITION BOOTH' => 'RERUAI PAMERAN',
    'Wood Easel Stand' => 'Penyangga Kayu',
    'Dental' => 'Pergigian',
    'Design' => 'Reka Bentuk',
    'Cafe' => 'Kafe',
    'Dessert' => 'Pencuci Mulut',
    'Indoor' => 'Dalaman',
    'Channel' => 'Saluran',
    'College' => 'Kolej',
    'Glass Window Sticker' => 'Pelekat Tingkap Kaca',
    'Glass Frosted' => 'Kaca Kabur',
    'Glass Sticker' => 'Pelekat Kaca',
    'Wall Sticker' => 'Pelekat Dinding',
    'White Sticker' => 'Pelekat Putih',
    'Stall Sticker' => 'Pelekat Gerai',
    'Escalator Glass Sticker' => 'Pelekat Kaca Eskalator',
    'Sticker Services' => 'Perkhidmatan Pelekat',
    'Sticker Service' => 'Perkhidmatan Pelekat',
    'Sticker' => 'Pelekat',
    'Backdrop Display Set' => 'Set Paparan Latar Belakang',
    'Backdrop Display' => 'Paparan Latar Belakang',
    'Backdrop' => 'Latar Belakang',
    'Roll Up Bunting' => 'Bunting Gulung',
    'Roll-up Bunting' => 'Bunting Gulung',
    'Wood Easel Stand Display Set' => 'Set Paparan Penyangga Kayu',
    'Display Set' => 'Set Paparan',
    'Display' => 'Paparan',
    'Construction' => 'Pembinaan',
    'Normal' => 'Biasa',
    'Services' => 'Perkhidmatan',
    'Service' => 'Perkhidmatan',
  ];
  $translated = str_ireplace(array_keys($replacements), array_values($replacements), $title);
  $translated = preg_replace('/\bwith\b/i', 'dengan', $translated) ?? $translated;
  $translated = preg_replace('/\band\b/i', 'dan', $translated) ?? $translated;
  $translated = preg_replace('/\bat site\b/i', 'di Tapak', $translated) ?? $translated;
  $translated = preg_replace('/\bfor\b/i', 'untuk', $translated) ?? $translated;
  return trim($translated);
}

function catalog_ms_localize(array $catalog): array
{
  $categoryTitles = catalog_ms_category_titles();
  foreach ($catalog['categories'] as &$category) {
    $category['title'] = $categoryTitles[$category['id']] ?? $category['title'];
    $category['seo_title'] = $category['title'];
    $category['meta_description'] = 'Terokai produk dalam kategori ' . $category['title'] . ' daripada A&T Media.';
  }
  unset($category);

  $localizedCategoryMap = [];
  foreach ($catalog['categories'] as $category) {
    $localizedCategoryMap[$category['id']] = $category['title'];
  }
  foreach ($catalog['products'] as &$product) {
    $product['title'] = catalog_ms_product_title((string) ($product['title'] ?? 'Produk'));
    $categoryTitle = $localizedCategoryMap[$product['category_id'] ?? ''] ?? 'Papan Tanda';
    $product['description'] = $product['title'] . ' ialah produk dalam kategori ' . $categoryTitle . ' oleh A&T Media. Hubungi kami untuk cadangan bahan, perancangan reka bentuk, ukuran tapak, pembuatan, penghantaran dan pemasangan.';
    $product['seo_title'] = $product['title'];
    $product['seo_keywords'] = strtolower($categoryTitle) . ', papan tanda KL, papan tanda Kuala Lumpur';
    $product['meta_description'] = $product['description'];
  }
  unset($product);
  return $catalog;
}
