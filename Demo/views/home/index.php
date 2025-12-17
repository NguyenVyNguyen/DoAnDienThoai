<div class="p-5 mb-5 text-white rounded-4 shadow-lg"
    style="background: linear-gradient(135deg, #1a1a1a 0%, #3a3a3a 50%, #4a4a4a 100%); position: relative; overflow: hidden;">
    <div class="container-fluid py-4 position-relative" style="z-index: 2;">
        <h1 class="display-4 fw-bolder mb-3">Công Nghệ Tương Lai</h1>
        <p class="col-md-7 fs-5 opacity-75 mb-4">Khám phá hệ sinh thái điện thoại và phụ kiện đẳng cấp nhất 2025. Trải nghiệm công nghệ dẫn đầu với mức giá ưu đãi độc quyền.</p>
        <button class="btn btn-primary btn-lg rounded-pill px-5 fw-bold shadow-sm" type="button">
            Mua sắm ngay <i class="fas fa-arrow-right ms-2"></i>
        </button>
    </div>
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
</div>
<div class="mb-5">
    <h3 class="mb-4 text-uppercase fw-bold border-start border-4 border-primary ps-3">Danh mục</h3>

    <?php if (isset($category)): ?>
        <div class="alert alert-light border-start border-4 border-info shadow-sm d-flex align-items-center" role="alert">
            <i class="fas fa-filter me-2 text-info"></i>
            Đang lọc: <strong class="ms-1 text-primary"><?= $category['name'] ?></strong>
            <a href="index.php" class="ms-auto text-muted text-decoration-none small">Xóa lọc</a>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-wrap gap-2">
        <a href="index.php" class="btn <?= !isset($category) ? 'btn-primary' : 'btn-outline-dark' ?> rounded-pill px-4">Tất cả</a>
        <?php foreach ($categorys as $c): ?>
            <a href="index.php?&a=filter&id=<?= $c['id_category'] ?>"
                class="btn <?= (isset($category) && $category['id_category'] == $c['id_category']) ? 'btn-primary' : 'btn-outline-dark' ?> rounded-pill px-4 transition-all">
                <?= $c['name'] ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
<h3 class="mb-4 text-uppercase fw-bold border-start border-4 border-primary ps-3">Sản phẩm nổi bật</h3>

<div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
    <?php foreach ($products as $p): ?>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm product-card-hover rounded-4 overflow-hidden">
                <div class="position-relative overflow-hidden bg-light" style="padding-top: 100%;">
                    <img src="<?= htmlspecialchars($p['image']) ?>"
                        alt="<?= htmlspecialchars($p['name']) ?>"
                        class="position-absolute top-50 start-50 translate-middle w-100 h-100 p-3 object-fit-contain transition-transform">

                    <span class="badge bg-dark position-absolute top-0 start-0 m-3 rounded-pill px-3 py-2 shadow-sm" style="font-size: 0.7rem;">
                        <?= htmlspecialchars($p['brand']) ?>
                    </span>
                </div>

                <div class="card-body d-flex flex-column p-4">
                    <div class="mb-2">
                        <span class="badge bg-primary-subtle text-primary fw-normal rounded-1" style="font-size: 0.65rem;">
                            <?= htmlspecialchars($p['cat_name']) ?>
                        </span>
                    </div>

                    <h6 class="card-title fw-bold text-dark text-truncate-2 mb-2" style="height: 2.8rem; line-height: 1.4;">
                        <?= htmlspecialchars($p['name']) ?>
                    </h6>

                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="p-1 rounded-circle border shadow-sm" style="background-color: <?= $p['color'] ?>; width: 15px; height: 15px;" title="<?= $p['color'] ?>"></span>
                        <small class="text-secondary opacity-75"><?= htmlspecialchars($p['color']) ?></small>
                    </div>

                    <div class="mt-auto">
                        <div class="d-flex flex-column mb-3">
                            <span class="h5 mb-0 text-danger fw-bolder">
                                <?= number_format($p['price'], 0, ',', '.') ?>đ
                            </span>
                            <small class="text-muted text-decoration-line-through small"><?= number_format($p['price'] * 1.1, 0, ',', '.') ?>đ</small>
                        </div>

                        <a href="index.php?c=cart&a=add&id=<?= $p['id_product'] ?>"
                            class="btn btn-dark w-100 rounded-pill py-2 fw-bold d-flex align-items-center justify-content-center gap-2 btn-add-cart">
                            <i class="fas fa-shopping-bag small"></i> Thêm vào giỏ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<style>
    /* Hiệu ứng hover cho card sản phẩm */
    .product-card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    /* Hiệu ứng zoom ảnh khi hover */
    .product-card-hover:hover img {
        transform: translate(-50%, -50%) scale(1.1);
    }

    /* Giới hạn text 2 dòng */
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Nút thêm vào giỏ hàng */
    .btn-add-cart {
        transition: all 0.2s ease;
    }

    .btn-add-cart:hover {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
    }

    /* Bo góc nút danh mục */
    .transition-all {
        transition: all 0.3s ease;
    }
</style>