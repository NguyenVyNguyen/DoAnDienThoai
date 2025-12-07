<?php
session_start();
require_once 'config/db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($page) {
    case 'dashboard':
        require_once 'controllers/DashboardController.php';
        (new DashboardController())->index();
        break;

    case 'products':
        require_once 'controllers/ProductController.php';
        $controller = new ProductController();
        if ($action == 'store') $controller->store();
        elseif ($action == 'edit') $controller->edit(); 
        elseif ($action == 'update') $controller->update();
        elseif ($action == 'delete') $controller->delete();
        else $controller->index();
        break;

    // --- MỚI: QUẢN LÝ DANH MỤC ---
    case 'categories':
        require_once 'controllers/CategoryController.php';
        $controller = new CategoryController();
        if ($action == 'store') $controller->store();
        elseif ($action == 'edit') $controller->edit();
        elseif ($action == 'update') $controller->update();
        elseif ($action == 'delete') $controller->delete();
        else $controller->index();
        break;

    // --- MỚI: QUẢN LÝ ĐƠN HÀNG ---
    case 'orders':
        require_once 'controllers/OrderController.php';
        $controller = new OrderController();
        if ($action == 'detail') $controller->detail(); 
        elseif ($action == 'update_status') $controller->updateStatus(); 
        else $controller->index();
        break;

    case 'users':
        require_once 'controllers/UserController.php';
        $controller = new UserController();
        if ($action == 'store') {
            $controller->store();   
        } elseif ($action == 'edit') {
            $controller->edit();   
        } elseif ($action == 'update') {
            $controller->update();  
        } elseif ($action == 'delete') {
            $controller->delete(); 
        } else {
            $controller->index();  
        }
        break;

    default:
        echo "404 - Trang không tồn tại";
        break;
}
?>