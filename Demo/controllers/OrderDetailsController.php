<?php
require_once 'controllers/BaseController.php';
require_once 'models/OrderDetails.php';

class OrderDetailsController extends BaseController
{

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=user&a=loginerror');
            exit();
        }
        $id_user = isset($_SESSION['user']) ? $_SESSION['user']['id_user'] : null;
        // $id_user = 3; // Tạm thời giả lập user với id_user = 2
        $model = new OrderDetails();
        $orderDetails = $model->getAll($id_user);

        // Gắn active page
        $_SESSION['active_page'] = 'order_details';

        $this->render('order/index', [
            'orderDetails' => $orderDetails,
            'title' => 'Lịch sử mua hàng'
        ]);
    }

    public function chitiet()
    {
        // Code xử lý hiển thị chi tiết đơn hàng
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=user&a=loginerror');
            exit();
        }
        $id_order = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id_order === null) {
            header('Location: index.php?c=order&a=index');
            exit();
        }
        $model = new OrderDetails();
        $orderItems = $model->getByOrderId($id_order);
        $this->render('order/details', [
            'orderItems' => $orderItems,
            'title' => 'Chi tiết đơn hàng #' . htmlspecialchars($id_order)
        ]);
    }

    public function cancel()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=user&a=loginerror');
            exit();
        }
        $id_order = isset($_GET['id_order']) ? $_GET['id_order'] : null;
        $id_product = isset($_GET['id_product']) ? $_GET['id_product'] : null;

        if ($id_order === null || $id_product === null) {
            header('Location: index.php?c=orderdetails');
            exit();
        }

        $model = new OrderDetails();
        $success = $model->cancelOrderDetail($id_order, $id_product);

        if ($success) {
            $_SESSION['success_message'] = 'Huỷ đơn hàng thành công.';
        } else {
            $_SESSION['error_message'] = 'Huỷ đơn hàng thất bại. Vui lòng thử lại.';
        }

        $orderItems = $model->getByOrderId($id_order);
        if (empty($orderItems)) {
            $model->updateOrderStatus($id_order, 'Đã huỷ');
            header('Location: index.php?c=orderdetails');
            exit();
        }

        header('Location: index.php?c=orderdetails&a=chitiet&id=' . $id_order);
        exit();
    }
}
