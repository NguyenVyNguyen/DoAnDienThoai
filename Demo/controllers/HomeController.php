<?php
require_once 'controllers/BaseController.php';
require_once 'models/ProductModel.php';

class HomeController extends BaseController {
    public function index() {
        $model = new ProductModel();
        $products = $model->getAll();
        
        // Truyền dữ liệu sang view
        $this->render('home/index', [
            'products' => $products,
            'title' => 'TechStore - Công Nghệ Đỉnh Cao'
        ]);
    }
}
?>