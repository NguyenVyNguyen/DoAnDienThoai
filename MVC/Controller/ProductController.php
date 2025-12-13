<?php
class ProductController {

    private $productDAO;
    private $categoryDAO;

    public function __construct(){
        $this->productDAO = new ProductDAO();
        $this->categoryDAO = new CategoryDAO();
    }

    public function listProducts(){
        // LẤY DỮ LIỆU
        $list_products = $this->productDAO->getAllProducts();
        $totalProducts = $this->productDAO->total_products();
        $list_categories = $this->categoryDAO->getAllCategories();

        // TRUYỀN SANG VIEW
        require_once 'Views/DashBoard.php';
    }
    public function filterByCategory($category_id){
        // LẤY DỮ LIỆU
        $list_products = $this->productDAO->getProductsByCategory($category_id);
        $totalProducts = count($list_products);
        $list_categories = $this->categoryDAO->getAllCategories();

        // TRUYỀN SANG VIEW
        require_once 'Views/DashBoard.php';
    }
    
}
