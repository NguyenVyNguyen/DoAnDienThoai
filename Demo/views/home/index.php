<?php
// Hàm hỗ trợ chọn ảnh demo dựa trên tên sản phẩm
function getProductImage($name)
{
    $name = strtolower($name);
    if (strpos($name, 'iphone') !== false) return 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg';
    if (strpos($name, 'samsung') !== false) return 'https://cdn.tgdd.vn/Products/Images/42/301796/samsung-galaxy-s23-ultra-thumb-600x600.jpg';
    if (strpos($name, 'xiaomi') !== false) return 'https://cdn.tgdd.vn/Products/Images/42/292770/xiaomi-13-lite-thumb-1-600x600.jpg';
    if (strpos($name, 'oppo') !== false) return 'https://cdn.tgdd.vn/Products/Images/42/309714/oppo-reno10-pro-plus-thumbnew-600x600.jpg';
    if (strpos($name, 'tai nghe') !== false) return 'https://cdn.tgdd.vn/Products/Images/54/236026/airpods-3-thumb-600x600.jpg';
    if (strpos($name, 'sạc') !== false || strpos($name, 'cáp') !== false) return 'https://cdn.tgdd.vn/Products/Images/58/281699/adapter-sac-3-cong-usb-type-c-65w-pd-samsung-ep-t6530-den-thumb-600x600.jpg';
    return 'https://placehold.co/600x600?text=Tech+Gadget';
}
?>

<div class="p-5 mb-4 bg-dark text-white rounded-3 shadow" style="background: linear-gradient(45deg, #1a1a1a, #4a4a4a);">
    <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">Công Nghệ Tương Lai</h1>
        <p class="col-md-8 fs-4">Khám phá những mẫu điện thoại và phụ kiện mới nhất 2025 với mức giá ưu đãi chưa từng có.</p>
        <button class="btn btn-primary btn-lg rounded-pill px-4" type="button">Mua sắm ngay</button>
    </div>
</div>

<h3 class="mb-4 text-uppercase fw-bold border-start border-4 border-primary ps-3">Sản phẩm nổi bật</h3>
<!-- Lọc theo danh mục -->
<h3 class="mb-4 text-uppercase fw-bold border-start border-4 border-primary ps-3">Danh mục</h3>
<?php if (isset($category)): ?>
    <div class="alert alert-info" role="alert">
        Đang lọc theo danh mục: <strong><?= $category['name'] ?></strong>
    </div>
<?php endif; ?>
<?php foreach ($categorys as $c): ?>
    <a href="index.php?&a=filter&id=<?= $c['id_category'] ?>" class="btn btn-outline-primary btn-add-cart w-100">
        <i class="fas fa-cart-plus me-1"></i> <?= $c['name'] ?>
    </a>
<?php endforeach; ?>
<!-- Danh sách sản phẩm -->
<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    <?php foreach ($products as $p): ?>
        <div class="col">
            <div class="card product-card h-100">
                <div class="card-img-wrapper">
                    <img src="<?= getProductImage($p['name']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                    <span class="badge-brand"><?= htmlspecialchars($p['brand']) ?></span>
                </div>
                <div class="card-body d-flex flex-column">
                    <small class="text-muted mb-1"><?= htmlspecialchars($p['cat_name']) ?></small>
                    <h5 class="card-title text-truncate" title="<?= htmlspecialchars($p['name']) ?>">
                        <?= htmlspecialchars($p['name']) ?>
                    </h5>
                    <p class="small text-secondary"><i class="fas fa-palette"></i> Màu: <?= htmlspecialchars($p['color']) ?></p>

                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h5 mb-0 text-danger fw-bold"><?= number_format($p['price'], 0, ',', '.') ?>đ</span>
                        </div>
                        <a href="index.php?c=cart&a=add&id=<?= $p['id_product'] ?>" class="btn btn-outline-primary btn-add-cart w-100">
                            <i class="fas fa-cart-plus me-1"></i> Thêm vào giỏ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>