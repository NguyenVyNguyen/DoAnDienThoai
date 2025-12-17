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
}
