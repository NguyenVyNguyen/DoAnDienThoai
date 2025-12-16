<?php
require_once 'controllers/BaseController.php';
require_once 'models/ProductModel.php';
require_once 'models/CategoryModel.php';

class HomeController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $products = $model->getAll();
        $categorys = new CategoryModel()->getAll();

        //Gắn active page
        $_SESSION['active_page'] = 'home';

        // Truyền dữ liệu sang view
        $this->render('home/index', [
            'products' => $products,
            'categorys' => $categorys,
            'title' => 'TechStore - Công Nghệ Đỉnh Cao'
        ]);
    }

    public function filter()
    {
        $id = $_GET['id'] ?? 0;
        if ($id) {
            $model = new ProductModel();
            $categoryModel = new CategoryModel();
            $products = $model->getByCategory($id);


            $categorys = $categoryModel->getAll();
            $category = $categoryModel->getById($id);

            // Gắn active page
            $_SESSION['active_page'] = 'home';

            // Truyền dữ liệu sang view
            $this->render('home/index', [
                'products' => $products,
                'categorys' => $categorys,
                'category' => $category,
                'title' => 'TechStore - Lọc Sản Phẩm'
            ]);
        } else {
            header('Location: index.php');
        }
    }
}
