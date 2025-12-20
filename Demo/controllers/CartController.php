<?php
require_once 'controllers/BaseController.php';
require_once 'models/ProductModel.php';
require_once 'models/OrderModel.php';
require_once 'models/OrderDetails.php';

class CartController extends BaseController
{

    public function index()
    {
        $cart = $_SESSION['cart'] ?? [];
        $model = new ProductModel();
        $cartItems = [];
        $totalMoney = 0;

        foreach ($cart as $id => $qty) {
            $p = $model->getById($id);
            if ($p) {
                $p['qty'] = $qty;
                $p['total'] = $p['price'] * $qty;
                $totalMoney += $p['total'];
                $cartItems[] = $p;
            }
        }

        // Gắn active page
        $_SESSION['active_page'] = 'cart';

        $this->render('cart/index', [
            'cartItems' => $cartItems,
            'totalMoney' => $totalMoney,
            'title' => 'Giỏ hàng'
        ]);
    }

    public function add()
    {
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
        }
        header('Location: index.php?c=cart');
        // header("Location: index.php");
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'] ?? 0;
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
            }
            header('Location: index.php?c=cart');
        }
    }

    // public function update()
    // {

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         if (isset($_POST['update_cart']) && isset($_POST['quantity'])) {
    //             $productModel = new ProductModel();

    //             foreach ($_POST['quantity'] as $id_product => $qty) {
    //                 $p = $productModel->getById($id_product);

    //                 $qty = (int)$qty;

    //                 if ($qty > 0 && $qty <= $p['quantity']) {
    //                     $_SESSION['cart'][$id_product] = $qty;
    //                 } else {
    //                     // Xử lý trường hợp số lượng không hợp lệ (ví dụ: hiển thị thông báo lỗi)
    //                     header('Location: index.php?c=cart&&error=invalid_quantity');
    //                     exit();
    //                 }
    //             }
    //         }

    //         header('Location: index.php?c=cart');
    //     }
    // }

    public function update()
    {
        if (!isset($_POST['update_cart'], $_POST['quantity'])) {
            header('Location: index.php?c=cart');
            exit();
        }

        $productModel = new ProductModel();

        // 1. Validate trước
        foreach ($_POST['quantity'] as $id_product => $qty) {
            $qty = (int)$qty;
            $p = $productModel->getById($id_product);

            if (!$p || $qty <= 0 || $qty > $p['quantity']) {
                header('Location: index.php?c=cart&error=invalid_quantity');
                exit();
            }
        }

        // 2. Update sau
        foreach ($_POST['quantity'] as $id_product => $qty) {
            if ($id_product <= 0 || $id_product == null || $id_product == '') continue;
            $_SESSION['cart'][$id_product] = (int)$qty;
        }

        header('Location: index.php?c=cart');
        exit();
    }


    public function success()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            if (!isset($_SESSION['user'])) {
                header('Location: index.php?c=user&a=loginerror');
                exit();
            }
            // Xử lý thanh toán ở đây (ví dụ: lưu đơn hàng vào database)
            $model = new OrderModel();
            $id_user = $_SESSION['user']['id_user'];
            $order_id = $model->create($id_user);

            $orderDetails = new OrderDetails();
            $carts = $_SESSION['cart'] ?? [];
            $kt = true;
            foreach ($carts as $id_product => $quantity) {
                if ($id_product <= 0 || $id_product == null || $id_product == '') continue;
                if (!$orderDetails->create($order_id, $id_product, $quantity)) {
                    $kt = false;
                }
            }

            // Xóa giỏ hàng sau khi thanh toán
            unset($_SESSION['cart']);

            // Gắn active page
            $_SESSION['active_page'] = 'cart';

            $this->render('cart/index', [
                'title' => 'Thanh toán thành công',
                "error" => $kt ?? false
            ]);
        }
    }
}
