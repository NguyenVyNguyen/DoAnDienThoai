<?php
class KH_DashboardController
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function index()
    {
        // 1. Tổng sản phẩm
        $stmt = $this->conn->query("SELECT COUNT(*) FROM product");
        $stmt->execute();
        $total_products = $stmt->fetchColumn();

        // 2. Danh sách sản phẩm
        $stmt = $this->conn->query("SELECT * FROM product");
        $stmt->execute();
        $list_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //3. Các danh mục sản phẩm (nếu cần)
        $stmt = $this->conn->query("SELECT * FROM category");
        $stmt->execute();
        $list_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Load View
        require_once 'views/Dashboard.php';
    }

    // public function filterByCategory($category_id) {
    //     // Logic lọc sản phẩm theo danh mục
    //     $stmt = $this->conn->prepare("SELECT * FROM product WHERE id_category = :id_category");
    //     $stmt->bindParam(':id_category', $category_id);
    //     $stmt->execute();
    //     $list_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     // Load View với sản phẩm đã lọc
    //     require_once 'views/Dashboard.php';
    // }
    public function filterByCategory($category_id)
{
    // 1. Lọc sản phẩm theo danh mục
    $stmt = $this->conn->prepare("
        SELECT * 
        FROM product 
        WHERE id_category = :id_category
    ");
    $stmt->bindParam(':id_category', $category_id, PDO::PARAM_INT);
    $stmt->execute();
    $list_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2. Lấy lại danh sách danh mục
    $stmt = $this->conn->query("SELECT * FROM category");
    $stmt->execute();
    $list_categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 3. Tổng số sản phẩm sau khi lọc
    $total_products = count($list_products);

    // 4. Load view
    require 'views/Dashboard.php';
}

}
