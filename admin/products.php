<?php
declare(strict_types=1);

require_once __DIR__ . '/../includes/catalog.php';

$sessionDir = __DIR__ . '/../data/sessions';
if (!is_dir($sessionDir)) {
  mkdir($sessionDir, 0755, true);
}
session_save_path($sessionDir);
session_start();

$passwordFile = __DIR__ . '/../data/admin-password.php';
$uploadDir = __DIR__ . '/../uploads/products';
$messages = [];
$errors = [];

function h(string $value): string
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function admin_excerpt(string $value, int $limit = 90): string
{
  $value = trim(preg_replace('/\s+/', ' ', $value) ?? '');
  if (strlen($value) <= $limit) {
    return $value;
  }
  return substr($value, 0, max(0, $limit - 3)) . '...';
}

function admin_password_hash_file(string $passwordFile): ?string
{
  if (!is_file($passwordFile)) {
    return null;
  }
  $hash = include $passwordFile;
  return is_string($hash) ? $hash : null;
}

function admin_write_password_hash(string $passwordFile, string $password): void
{
  $hash = password_hash($password, PASSWORD_DEFAULT);
  file_put_contents($passwordFile, "<?php\nreturn " . var_export($hash, true) . ";\n", LOCK_EX);
}

function admin_is_logged_in(): bool
{
  return !empty($_SESSION['catalog_admin']);
}

function admin_upload_product_photo(array $file, string $uploadDir): ?string
{
  if (($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
    return null;
  }
  if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
    throw new RuntimeException('Photo upload failed. Please try again.');
  }
  if (($file['size'] ?? 0) > 5 * 1024 * 1024) {
    throw new RuntimeException('Photo must be 5MB or smaller.');
  }

  $finfo = new finfo(FILEINFO_MIME_TYPE);
  $mime = $finfo->file($file['tmp_name']);
  $extensions = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp',
    'image/gif' => 'gif',
  ];
  if (!isset($extensions[$mime])) {
    throw new RuntimeException('Photo must be a JPG, PNG, WebP, or GIF image.');
  }

  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  $filename = 'product-' . date('YmdHis') . '-' . bin2hex(random_bytes(4)) . '.' . $extensions[$mime];
  $target = $uploadDir . '/' . $filename;
  if (!move_uploaded_file($file['tmp_name'], $target)) {
    throw new RuntimeException('Could not save uploaded photo.');
  }

  return 'uploads/products/' . $filename;
}

function admin_category_has_descendant(array $catalog, string $categoryId, string $possibleDescendantId): bool
{
  foreach ($catalog['categories'] as $category) {
    if (($category['parent_id'] ?? null) !== $categoryId) {
      continue;
    }
    if ($category['id'] === $possibleDescendantId || admin_category_has_descendant($catalog, $category['id'], $possibleDescendantId)) {
      return true;
    }
  }
  return false;
}

$passwordHash = admin_password_hash_file($passwordFile);
$needsSetup = $passwordHash === null;

if (($_GET['logout'] ?? '') === '1') {
  $_SESSION = [];
  session_destroy();
  header('Location: products.php');
  exit;
}

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($requestMethod === 'POST') {
  $action = $_POST['action'] ?? '';

  if ($action === 'setup') {
    $password = (string) ($_POST['password'] ?? '');
    if (strlen($password) < 8) {
      $errors[] = 'Use at least 8 characters for the admin password.';
    } else {
      admin_write_password_hash($passwordFile, $password);
      $_SESSION['catalog_admin'] = true;
      header('Location: products.php');
      exit;
    }
  } elseif ($action === 'login') {
    $password = (string) ($_POST['password'] ?? '');
    if ($passwordHash && password_verify($password, $passwordHash)) {
      $_SESSION['catalog_admin'] = true;
      header('Location: products.php');
      exit;
    }
    $errors[] = 'Invalid password.';
  } elseif (admin_is_logged_in()) {
    $catalog = catalog_load();

    try {
      if ($action === 'save_category') {
        $id = trim((string) ($_POST['id'] ?? ''));
        $title = trim((string) ($_POST['title'] ?? ''));
        $parentId = trim((string) ($_POST['parent_id'] ?? '')) ?: null;
        if ($title === '') {
          throw new RuntimeException('Category title is required.');
        }
        if ($id !== '' && ($parentId === $id || ($parentId && admin_category_has_descendant($catalog, $id, $parentId)))) {
          throw new RuntimeException('A category cannot be nested inside itself or one of its children.');
        }

        $category = [
          'id' => $id ?: catalog_id('cat'),
          'title' => $title,
          'parent_id' => $parentId,
          'seo_title' => trim((string) ($_POST['seo_title'] ?? '')),
          'seo_keywords' => trim((string) ($_POST['seo_keywords'] ?? '')),
          'meta_description' => trim((string) ($_POST['meta_description'] ?? '')),
          'sort_order' => (int) ($_POST['sort_order'] ?? 0),
        ];

        $index = $id !== '' ? catalog_find_index($catalog['categories'], $id) : null;
        if ($index === null) {
          $catalog['categories'][] = $category;
          $messages[] = 'Category added.';
        } else {
          $catalog['categories'][$index] = $category;
          $messages[] = 'Category updated.';
        }
        catalog_save($catalog);
      }

      if ($action === 'delete_category') {
        $id = (string) ($_POST['id'] ?? '');
        foreach ($catalog['categories'] as $category) {
          if (($category['parent_id'] ?? null) === $id) {
            throw new RuntimeException('Move or delete nested categories first.');
          }
        }
        foreach ($catalog['products'] as $product) {
          if (($product['category_id'] ?? '') === $id) {
            throw new RuntimeException('Move or delete products in this category first.');
          }
        }
        $catalog['categories'] = array_values(array_filter($catalog['categories'], static fn($category) => ($category['id'] ?? '') !== $id));
        catalog_save($catalog);
        $messages[] = 'Category deleted.';
      }

      if ($action === 'save_product') {
        $id = trim((string) ($_POST['id'] ?? ''));
        $title = trim((string) ($_POST['title'] ?? ''));
        if ($title === '') {
          throw new RuntimeException('Product title is required.');
        }

        $existingImage = trim((string) ($_POST['existing_image'] ?? ''));
        $uploadedImage = isset($_FILES['photo']) ? admin_upload_product_photo($_FILES['photo'], $uploadDir) : null;
        $product = [
          'id' => $id ?: catalog_id('prod'),
          'title' => $title,
          'description' => trim((string) ($_POST['description'] ?? '')),
          'category_id' => trim((string) ($_POST['category_id'] ?? '')),
          'image' => $uploadedImage ?: ($existingImage ?: CATALOG_DEFAULT_IMAGE),
          'icon' => trim((string) ($_POST['icon'] ?? 'fa-sign')) ?: 'fa-sign',
          'seo_title' => trim((string) ($_POST['seo_title'] ?? '')),
          'seo_keywords' => trim((string) ($_POST['seo_keywords'] ?? '')),
          'meta_description' => trim((string) ($_POST['meta_description'] ?? '')),
          'sort_order' => (int) ($_POST['sort_order'] ?? 0),
        ];

        $index = $id !== '' ? catalog_find_index($catalog['products'], $id) : null;
        if ($index === null) {
          $catalog['products'][] = $product;
          $messages[] = 'Product added.';
        } else {
          $catalog['products'][$index] = $product;
          $messages[] = 'Product updated.';
        }
        catalog_save($catalog);
      }

      if ($action === 'delete_product') {
        $id = (string) ($_POST['id'] ?? '');
        $catalog['products'] = array_values(array_filter($catalog['products'], static fn($product) => ($product['id'] ?? '') !== $id));
        catalog_save($catalog);
        $messages[] = 'Product deleted.';
      }
    } catch (Throwable $exception) {
      $errors[] = $exception->getMessage();
    }
  }
}

$catalog = catalog_load();
$categoryMap = catalog_category_map($catalog);
$categoryOptions = catalog_category_options($catalog);
$editCategoryId = (string) ($_GET['edit_category'] ?? '');
$editProductId = (string) ($_GET['edit_product'] ?? '');
$editCategory = $editCategoryId !== '' ? ($catalog['categories'][catalog_find_index($catalog['categories'], $editCategoryId) ?? -1] ?? null) : null;
$editProduct = $editProductId !== '' ? ($catalog['products'][catalog_find_index($catalog['products'], $editProductId) ?? -1] ?? null) : null;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Products | A&amp;T Media</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
      :root { --brand-red: #d71920; --ink: #111111; --line: #dddddd; --soft: #f6f6f6; }
      body { background: var(--soft); color: var(--ink); font-family: Arial, Helvetica, sans-serif; }
      .admin-shell { max-width: 1180px; margin: 0 auto; padding: 34px 16px 56px; }
      .topbar { align-items: center; display: flex; justify-content: space-between; margin-bottom: 22px; }
      .topbar h1 { font-size: 1.65rem; font-weight: 850; margin: 0; }
      .panel { background: #ffffff; border: 1px solid var(--line); padding: 22px; margin-bottom: 22px; }
      .panel h2 { font-size: 1.15rem; font-weight: 850; margin-bottom: 18px; }
      label { font-weight: 700; }
      .btn-red { background: var(--brand-red); border-color: var(--brand-red); color: #ffffff; font-weight: 700; }
      .btn-red:hover { color: #ffffff; filter: brightness(0.92); }
      .thumb { height: 54px; width: 72px; object-fit: cover; background: #111111; }
      .table td, .table th { vertical-align: middle; }
      .muted { color: #777777; font-size: 0.92rem; }
      .login-card { max-width: 430px; margin: 8vh auto; }
      .panel-header { align-items: center; display: flex; gap: 14px; justify-content: space-between; margin-bottom: 18px; }
      .panel-header h2 { margin-bottom: 0; }
      .modal-content { border-radius: 8px; }
      .modal-title { font-weight: 850; }
      textarea.form-control { min-height: 116px; }
    </style>
  </head>
  <body>
    <main class="admin-shell">
      <?php if (!admin_is_logged_in()): ?>
        <section class="panel login-card">
          <h1 class="h4 mb-3"><?php echo $needsSetup ? 'Create Admin Password' : 'Product Admin Login'; ?></h1>
          <?php foreach ($errors as $error): ?><div class="alert alert-danger"><?php echo h($error); ?></div><?php endforeach; ?>
          <form method="post">
            <input type="hidden" name="action" value="<?php echo $needsSetup ? 'setup' : 'login'; ?>">
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" type="password" name="password" required minlength="<?php echo $needsSetup ? '8' : '1'; ?>">
              <?php if ($needsSetup): ?><div class="muted mt-2">This first-time setup stores a password hash in the protected data folder.</div><?php endif; ?>
            </div>
            <button class="btn btn-red btn-block" type="submit"><?php echo $needsSetup ? 'Create Password' : 'Login'; ?></button>
          </form>
        </section>
      <?php else: ?>
        <div class="topbar">
          <div>
            <h1>Manage Products</h1>
            <div class="muted">Add products, upload photos, edit SEO fields, and build nested categories.</div>
          </div>
          <div>
            <a class="btn btn-outline-secondary btn-sm" href="../products.php">View Products</a>
            <a class="btn btn-outline-danger btn-sm" href="?logout=1">Logout</a>
          </div>
        </div>

        <?php foreach ($messages as $message): ?><div class="alert alert-success"><?php echo h($message); ?></div><?php endforeach; ?>
        <?php foreach ($errors as $error): ?><div class="alert alert-danger"><?php echo h($error); ?></div><?php endforeach; ?>

        <section class="panel">
          <div class="panel-header">
            <h2>Categories</h2>
            <button class="btn btn-red btn-sm" type="button" data-toggle="modal" data-target="#categoryModal">Add Category</button>
          </div>
          <div class="table-responsive">
            <table class="table table-sm">
              <thead><tr><th>Title</th><th>Parent</th><th class="text-right">Actions</th></tr></thead>
              <tbody>
                <?php foreach ($catalog['categories'] as $category): ?>
                  <tr>
                    <td><?php echo h($category['title']); ?></td>
                    <td><?php echo h($category['parent_id'] ? catalog_category_title($categoryMap, $category['parent_id']) : 'Top level'); ?></td>
                    <td class="text-right">
                      <a class="btn btn-outline-secondary btn-sm" href="?edit_category=<?php echo h($category['id']); ?>">Edit</a>
                      <form class="d-inline" method="post" onsubmit="return confirm('Delete this category?');">
                        <input type="hidden" name="action" value="delete_category">
                        <input type="hidden" name="id" value="<?php echo h($category['id']); ?>">
                        <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>

        <section class="panel">
          <div class="panel-header">
            <h2>Products</h2>
            <button class="btn btn-red btn-sm" type="button" data-toggle="modal" data-target="#productModal">Add Product</button>
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead><tr><th>Photo</th><th>Product</th><th>Category</th><th>SEO</th><th class="text-right">Actions</th></tr></thead>
              <tbody>
                <?php foreach ($catalog['products'] as $product): ?>
                  <tr>
                    <td><img class="thumb" src="../<?php echo h($product['image'] ?: CATALOG_DEFAULT_IMAGE); ?>" alt=""></td>
                    <td><strong><?php echo h($product['title']); ?></strong><div class="muted"><?php echo h(admin_excerpt($product['description'] ?? '')); ?></div></td>
                    <td><?php echo h(catalog_category_title($categoryMap, $product['category_id'] ?? '')); ?></td>
                    <td class="muted"><?php echo h($product['seo_title'] ?: 'No SEO title'); ?></td>
                    <td class="text-right">
                      <a class="btn btn-outline-secondary btn-sm" href="?edit_product=<?php echo h($product['id']); ?>">Edit</a>
                      <form class="d-inline" method="post" onsubmit="return confirm('Delete this product?');">
                        <input type="hidden" name="action" value="delete_product">
                        <input type="hidden" name="id" value="<?php echo h($product['id']); ?>">
                        <button class="btn btn-outline-danger btn-sm" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>

        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <form method="post">
                <div class="modal-header">
                  <h2 class="modal-title h5" id="categoryModalTitle"><?php echo $editCategory ? 'Edit Category' : 'Add Category'; ?></h2>
                  <a class="close" href="products.php" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="action" value="save_category">
                  <input type="hidden" name="id" value="<?php echo h($editCategory['id'] ?? ''); ?>">
                  <div class="form-group">
                    <label for="categoryTitle">Title</label>
                    <input id="categoryTitle" class="form-control" name="title" value="<?php echo h($editCategory['title'] ?? ''); ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="parentId">Parent Category</label>
                    <select id="parentId" class="form-control" name="parent_id">
                      <option value="">Top level</option>
                      <?php foreach (catalog_category_options($catalog, $editCategory['id'] ?? null) as $option): ?>
                        <option value="<?php echo h($option['id']); ?>" <?php echo (($editCategory['parent_id'] ?? '') === $option['id']) ? 'selected' : ''; ?>><?php echo h($option['title']); ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="categorySeoTitle">SEO Title</label>
                    <input id="categorySeoTitle" class="form-control" name="seo_title" value="<?php echo h($editCategory['seo_title'] ?? ''); ?>">
                  </div>
                  <div class="form-group">
                    <label for="categoryKeywords">SEO Keywords</label>
                    <input id="categoryKeywords" class="form-control" name="seo_keywords" value="<?php echo h($editCategory['seo_keywords'] ?? ''); ?>">
                  </div>
                  <div class="form-group mb-0">
                    <label for="categoryMeta">Meta Description</label>
                    <textarea id="categoryMeta" class="form-control" name="meta_description"><?php echo h($editCategory['meta_description'] ?? ''); ?></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-outline-secondary" href="products.php">Cancel</a>
                  <button class="btn btn-red" type="submit">Save Category</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                  <h2 class="modal-title h5" id="productModalTitle"><?php echo $editProduct ? 'Edit Product' : 'Add Product'; ?></h2>
                  <a class="close" href="products.php" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="action" value="save_product">
                  <input type="hidden" name="id" value="<?php echo h($editProduct['id'] ?? ''); ?>">
                  <input type="hidden" name="existing_image" value="<?php echo h($editProduct['image'] ?? ''); ?>">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="productTitle">Title</label>
                      <input id="productTitle" class="form-control" name="title" value="<?php echo h($editProduct['title'] ?? ''); ?>" required>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="productCategory">Category</label>
                      <select id="productCategory" class="form-control" name="category_id">
                        <option value="">Uncategorized</option>
                        <?php foreach ($categoryOptions as $option): ?>
                          <option value="<?php echo h($option['id']); ?>" <?php echo (($editProduct['category_id'] ?? '') === $option['id']) ? 'selected' : ''; ?>><?php echo h($option['title']); ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="col-12 form-group">
                      <label for="description">Description</label>
                      <textarea id="description" class="form-control" name="description"><?php echo h($editProduct['description'] ?? ''); ?></textarea>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="photo">Photo Upload</label>
                      <input id="photo" class="form-control-file" type="file" name="photo" accept="image/jpeg,image/png,image/webp,image/gif">
                      <?php if (!empty($editProduct['image'])): ?><div class="muted mt-2">Current: <?php echo h($editProduct['image']); ?></div><?php endif; ?>
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="icon">Font Awesome Icon</label>
                      <input id="icon" class="form-control" name="icon" value="<?php echo h($editProduct['icon'] ?? 'fa-sign'); ?>">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="seoTitle">SEO Title</label>
                      <input id="seoTitle" class="form-control" name="seo_title" value="<?php echo h($editProduct['seo_title'] ?? ''); ?>">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="seoKeywords">SEO Keywords</label>
                      <input id="seoKeywords" class="form-control" name="seo_keywords" value="<?php echo h($editProduct['seo_keywords'] ?? ''); ?>">
                    </div>
                    <div class="col-12 form-group mb-0">
                      <label for="metaDescription">Meta Description</label>
                      <textarea id="metaDescription" class="form-control" name="meta_description"><?php echo h($editProduct['meta_description'] ?? ''); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-outline-secondary" href="products.php">Cancel</a>
                  <button class="btn btn-red" type="submit">Save Product</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php if (admin_is_logged_in() && $editCategory): ?>
      <script>$(function () { $('#categoryModal').modal('show'); });</script>
    <?php endif; ?>
    <?php if (admin_is_logged_in() && $editProduct): ?>
      <script>$(function () { $('#productModal').modal('show'); });</script>
    <?php endif; ?>
  </body>
</html>
