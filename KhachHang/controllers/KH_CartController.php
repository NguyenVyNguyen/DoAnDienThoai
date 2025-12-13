<?php
class KH_CartController {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function index() {
        // 1. Tổng sản phẩm
        $stmt = $this->conn->query("SELECT COUNT(*) FROM product");
        $stmt->execute();
        $total_products = $stmt->fetchColumn();

        // 2. Danh sách sản phẩm
        $stmt = $this->conn->query("SELECT * FROM product");
        $stmt->execute();
        $list_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //

        // Load View
        require_once 'views/Cart.php';
    }
}
?>