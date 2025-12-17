<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TechStore - Công Nghệ Tương Lai' ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(45deg, #1a1a1a, #4a4a4a);
            --accent-color: #0d6efd;
            --soft-bg: #f8f9fa;
        }

        body {
            background-color: var(--soft-bg);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Glassmorphism */
        .navbar {
            background: rgba(255, 255, 255, 0.9) !important;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link {
            font-weight: 600;
            font-size: 0.95rem;
            color: #444 !important;
            padding: 0.6rem 1rem !important;
            border-radius: 8px;
            transition: 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--accent-color) !important;
            background: rgba(13, 110, 253, 0.05);
        }

        /* Cart Icon Animation */
        .cart-icon-wrapper {
            transition: transform 0.2s;
        }

        .cart-icon-wrapper:hover {
            transform: scale(1.1);
        }

        /* Custom Dropdown */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 10px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 8px 15px;
            font-weight: 500;
        }

        /* Footer */
        footer {
            background: #111;
            color: #aaa;
            padding: 60px 0 20px;
            margin-top: 80px;
        }

        footer .footer-logo {
            color: #fff;
            font-weight: 800;
            font-size: 1.5rem;
        }

        footer a {
            color: #888;
            text-decoration: none;
            transition: 0.3s;
        }

        footer a:hover {
            color: #fff;
            padding-left: 5px;
        }

        /* Main Content Transition */
        .page-container {
            animation: slideUp 0.6s cubic-bezier(0.23, 1, 0.32, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top py-3">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-microchip me-2"></i>TECHSTORE
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link <?= (!isset($_GET['c']) || $_GET['c'] == 'home') ? 'active' : '' ?>" href="index.php">
                            <i class="fas fa-home me-1 d-lg-none"></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($_GET['c']) && $_GET['c'] == 'orderdetails') ? 'active' : '' ?>" href="index.php?c=orderdetails">
                            Lịch sử mua hàng
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2 me-lg-3">
                        <?php $qty = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>
                        <a class="btn btn-dark rounded-pill px-3 cart-icon-wrapper position-relative" href="index.php?c=cart">
                            <i class="fas fa-shopping-basket me-1"></i>
                            <span class="d-lg-none">Giỏ hàng</span>
                            <?php if ($qty > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-white">
                                    <?= $qty ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>

                    <div class="vr d-none d-lg-block mx-2 opacity-25" style="height: 25px;"></div>

                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item dropdown ms-lg-2">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px; font-size: 0.75rem;">
                                    <?= strtoupper(substr($_SESSION['user']['fullname'], 0, 1)) ?>
                                </div>
                                <span><?= htmlspecialchars($_SESSION['user']['fullname']) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li><a class="dropdown-item" href="index.php?c=user&a=profile"><i class="far fa-user-circle me-2"></i>Hồ sơ cá nhân</a></li>
                                <li><a class="dropdown-item text-danger" href="index.php?c=user&a=logout"><i class="fas fa-sign-out-alt me-2"></i>Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-lg-2">
                            <a class="nav-link text-primary fw-bold" href="index.php?c=user">Đăng nhập</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-primary rounded-pill px-4 shadow-sm fw-bold" href="index.php?c=user&a=logup">Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5 page-container" style="min-height: 80vh;">