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
                        aria-current="page">Sản phẩm</a>
                </li>

                <li class="nav-item me-2 me-md-3">
                    <a
                        href="index.php?page=Cart"
                        class="nav-link px-3 py-2 rounded fw-medium active"
                        aria-current="page"
                        style="color: #2563eb; background-color: #eff6ff;">Giỏ hàng</a>
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
    <main class="container mx-auto px-4 py-8 min-h-screen max-w-4xl">
        <h2 class="text-2xl font-bold mb-6">Giỏ hàng của bạn</h2>
        <div id="cart-container"></div>
    </main>
<?php require_once 'views/layout/footer.php'; ?>