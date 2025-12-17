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
        $id = $_GET['id'] ?? 0;
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: index.php?c=cart');
    }

    public function success()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=user&a=loginerror');
            exit();
        }
        // Xử lý thanh toán ở đây (ví dụ: lưu đơn hàng vào database)
        $model = new OrderModel();
        $id_user = $_SESSION['user']['id_user'];
        $order_id = $model->create($id_user);

        $orderDetails = new OrderDetails();
        foreach ($_SESSION['cart'] as $id_product => $quantity) {
            $orderDetails->create($order_id, $id_product, $quantity);
        }

        // Xóa giỏ hàng sau khi thanh toán
        unset($_SESSION['cart']);

        // Gắn active page
        $_SESSION['active_page'] = 'cart';

        $this->render('cart/index', [
            'title' => 'Thanh toán thành công'
        ]);
    }
}
