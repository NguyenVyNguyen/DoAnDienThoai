<?php
require_once 'DAO/dbConnection.php';
require_once 'DAO/ProductDAO.php';
require_once 'DAO/CategoryDAO.php';
require_once 'Controller/ProductController.php';

$page = $_GET['page'] ?? 'Dashboard';
$action = $_GET['action'] ?? '';

switch ($page) {
    case 'Dashboard':

        $controller = new ProductController();
        if ($action === 'filter' && isset($_GET['category_id'])) {
            $category_id = intval($_GET['category_id']);
            $controller->filterByCategory($category_id);
        } else {
            $controller->listProducts();
            break;
        }

    case 'Cart':
        session_start();
        $controller = new ProductController();
        if ($action === 'addToCart' && isset($_GET['id_product'])) {
            $id_product = intval($_GET['id_product']);

            // Lấy thông tin sản phẩm từ DB
            $productDAO = new ProductDAO();
            $productData = $productDAO->getProductById($id_product); // cần tạo hàm getProductById

            if ($productData) {
                // Tạo object Cart
                $cartItem = new Cart(
                    $productData['id_product'],
                    $productData['name'],
                    $productData['color'],
                    $productData['price'],
                    1 // số lượng mặc định khi add lần đầu
                );

                // Khởi tạo giỏ hàng trong session nếu chưa có
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                // Kiểm tra sản phẩm đã có trong giỏ chưa
                if (isset($_SESSION['cart'][$id_product])) {
                    // Tăng số lượng
                    $_SESSION['cart'][$id_product]->setQuantity(
                        $_SESSION['cart'][$id_product]->getQuantity() + 1
                    );
                } else {
                    // Thêm sản phẩm mới
                    $_SESSION['cart'][$id_product] = $cartItem;
                }
            }

            // Chuyển hướng về trang giỏ hàng
            header("Location: index.php?page=Cart");
            exit();
        } else {
            $controller->listProducts();
        }
        break;

    default:
        echo "404 - Page not found";
}
