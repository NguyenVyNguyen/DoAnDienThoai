<?php require_once 'views/layout/header.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm navbar-sticky">
    <div class="container px-4">
        <a href="index.php?page=Dashboard" class="navbar-brand d-flex align-items-center gap-2 fw-bold text-dark fs-5">
            <div class="logo-icon-bg">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </div>
            TechStore
        </a>

        <div class="d-flex align-items-center">
            <ul class="navbar-nav d-flex flex-row align-items-center ms-auto">

                <li class="nav-item me-2 me-md-3">
                    <a
                        href="index.php?page=Dashboard"
                        class="nav-link px-3 py-2 rounded fw-medium active"
                        aria-current="page"
                        style="color: #2563eb; background-color: #eff6ff;">Sản phẩm</a>
                </li>

                <li class="nav-item me-2 me-md-3">
                    <a
                        href="index.php?page=Cart"
                        class="nav-link px-3 py-2 rounded fw-medium active"
                        aria-current="page">Giỏ hàng</a>
                </li>

                <li class="nav-item me-2 me-md-3">
                    <a
                        href="index.php?page=Oredered"
                        class="nav-link px-3 py-2 rounded fw-medium active"
                        aria-current="page">Đơn hàng</a>
                </li>

                <li class="nav-item me-2 me-md-3">
                    <a
                        href="index.php?page=Profile"
                        class="nav-link px-3 py-2 rounded fw-medium active"
                        aria-current="page">Tài khoản</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="container px-4 py-5 min-vh-100">
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
        <div id="liveToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">Thêm vào giỏ thành công!</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-3 flex-shrink-0">
            <div class="bg-white rounded-3 shadow p-4 sticky-top" style="top: 80px;">
                <h3 class="fw-bold fs-5 mb-4 text-dark">Danh mục</h3>
                <ul class="list-unstyled space-y-2" id="category-list">
                    <li>
                        <a href="index.php?page=Dashboard" class="text-decoration-none text-secondary category-item" data-category="all">Tất cả sản phẩm</a>
                    </li>
                    <?php foreach ($list_categories as $category): ?>
                        <li>
                            <a href="index.php?page=Dashboard&action=filter_<?php echo $category['id_category']?>" class="text-decoration-none text-secondary category-item" data-category="<?php echo $category['id_category']; ?>">
                                <?php echo $category['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fs-4 fw-bold text-dark" id="category-title">Tất cả sản phẩm (<?php echo $total_products ?>)</h2>
                <input type="text" id="search-input" placeholder="Tìm kiếm..." class="form-control w-auto" onkeyup="handleSearch()">
            </div>

            <div id="product-grid" class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4">
                <?php foreach ($list_products as $product): ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body d-flex flex-column p-3">
                                <h3 class="card-title fs-5 fw-semibold text-dark mb-1"><?php echo $product['name']; ?></h3>

                                <p class="card-text text-secondary small mb-3"><?php echo $product['color']; ?></p>

                                <div class="mt-auto d-flex justify-content-between align-items-center pt-2">
                                    <span class="fs-5 fw-bold text-danger">
                                        <?php echo number_format($product['price']); ?> VND
                                    </span>

                                    <button
                                        onclick="addToCart(<?php echo $product['id_product']; ?>); showToast();"
                                        class="btn btn-sm p-2 rounded-circle btn-outline-primary"
                                        title="Thêm vào giỏ hàng"
                                        style="--bs-btn-hover-bg: #2563eb; --bs-btn-hover-color: white;">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>
<?php require_once 'views/layout/footer.php'; ?>