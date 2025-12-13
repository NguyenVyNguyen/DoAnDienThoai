<?php
session_start();
require_once 'config/db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'Dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($page) {

    case 'Dashboard':
        require_once 'controllers/KH_DashboardController.php';
        $controller = new KH_DashboardController();

        // Nếu có filter
        if (isset($_GET['action']) && strpos($_GET['action'], 'filter_') === 0) {
            $category_id = str_replace('filter_', '', $_GET['action']);
            $controller->filterByCategory($category_id);
        }
        // Nếu không filter → hiển thị tất cả sản phẩm
        else {
            $controller->index();
        }
        break;


    case 'Cart':
        require_once 'controllers/KH_CartController.php';
        $controller = new KH_CartController();
        if ($action === 'addToCart') {
            $controller->addToCart();
        } else {
            $controller->index();
        }

        break;

    case 'Ordered':
        require_once 'controllers/KH_OrderedController.php';

        break;

    case 'Profile':
        require_once 'controllers/KH_ProfileController.php';

        break;

    default:
        echo "404 - Trang không tồn tại";
        break;
}
