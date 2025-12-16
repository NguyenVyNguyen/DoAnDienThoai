<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'TechStore' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
        }

        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: 1px;
        }

        /* Product Card */
        .product-card {
            border: none;
            border-radius: 15px;
            transition: all 0.3s ease;
            background: white;
            overflow: hidden;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .card-img-wrapper {
            height: 220px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            padding: 20px;
            position: relative;
        }

        .card-img-wrapper img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.5s;
        }

        .product-card:hover .card-img-wrapper img {
            transform: scale(1.1);
        }

        /* Badges */
        .badge-brand {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        /* Buttons */
        .btn-add-cart {
            border-radius: 50px;
            font-weight: 600;
            padding: 8px 20px;
        }

        /* Footer */
        footer {
            background: #212529;
            color: #ccc;
            padding: 40px 0;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="index.php"><i class="fas fa-mobile-alt me-2"></i>TECHSTORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- <li class="nav-item"><a class="nav-link active" href="index.php">Trang chủ</a></li> -->
                    <?php $active = isset($_SESSION['active_page']) ? $_SESSION['active_page'] : '' ?>

                    <li class="nav-item"><a class="nav-link" href="#"><b><?php echo $active ?></b></a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($_SESSION['active_page'] == 'home' ? 'active' : '') ?>" href="index.php">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link <?php echo ($_SESSION['active_page'] == 'order_details' ? 'active' : '') ?>" href="index.php?c=orderdetails">Lịch sử mua hàng</a></li>
                    <li class="nav-item">
                        <?php $qty = isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>
                        <a class="btn btn-primary position-relative ms-2 rounded-pill" href="index.php?c=cart">
                            <i class="fas fa-shopping-bag"></i>
                            <?php if ($qty > 0): ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?= $qty ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item"> <a class="nav-link" href="#"><b>Xin chào, <?= htmlspecialchars($_SESSION['user']['fullname']) ?></b></a></li>
                        <li class="nav-item"><a class="nav-link <?php echo ($_SESSION['active_page'] == 'profile' ? 'active' : '') ?>" href="index.php?c=user&a=profile">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=user&a=logout">Đăng xuất</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link <?php echo ($_SESSION['active_page'] == 'login' ? 'active' : '') ?>" href="index.php?c=user">Đăng nhập</a></li>
                        <li class="nav-item"><a class="nav-link <?php echo ($_SESSION['active_page'] == 'signin' ? 'active' : '') ?>" href="index.php?c=user">Đăng ký</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-4" style="min-height: 80vh;">