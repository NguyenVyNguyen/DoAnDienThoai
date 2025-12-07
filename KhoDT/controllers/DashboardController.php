<?php
class DashboardController {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function index() {
        // 1. Tổng sản phẩm
        $stmt = $this->conn->query("SELECT COUNT(*) FROM product");
        $stmt->execute();
        $total_products = $stmt->fetchColumn();

        // 2. Sắp hết hàng (< 10)
        // $stmt = $this->conn->query("SELECT COUNT(*) FROM product WHERE quantity < 10");
        // $stmt->execute();
        // $low_stock = $stmt->fetchColumn();

        // 3. Đếm đơn hàng (giả định bảng orderdetails có cột id_order)
        // Nếu không có bảng orderdetails, bạn có thể count từ bảng order
        $stmt = $this->conn->query("SELECT COUNT(*) FROM `order`"); 
        $stmt->execute();
        $total_orders = $stmt->fetchColumn();

        // 4. Khách hàng
        $stmt = $this->conn->query("SELECT COUNT(*) FROM users WHERE role = 0"); // 0 là khách
        
        $total_customers = $stmt->fetchColumn();

        // Load View
        require_once 'views/dashboard.php';
    }
}
?>