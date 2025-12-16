<?php
require_once 'controllers/BaseController.php';
require_once 'models/OrderDetails.php';

class OrderDetailsController extends BaseController
{

    public function index()
    {
        $model = new OrderDetails();
        $orderDetails = $model->getAll();

        // Gắn active page
        $_SESSION['active_page'] = 'order_details';

        $this->render('order/index', [
            'orderDetails' => $orderDetails,
            'title' => 'Lịch sử mua hàng'
        ]);
    }
}
