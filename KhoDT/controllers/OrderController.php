<?php
class OrderController {
    private $conn;
    public function __construct() { $this->conn = Database::connect(); }

    // Danh sách đơn hàng
    public function index() {
    // Sửa câu lệnh SQL: 
    // 1. JOIN với orderdetails để lấy ngày (MAX(od.date))
    // 2. JOIN với product để lấy giá và tính tổng tiền (SUM)
    $sql = "SELECT o.id_order, o.status, u.fullname, 
                   MAX(od.date) as order_date, 
                   SUM(od.quantitybuy * p.price) as totalmoney
            FROM `order` o 
            JOIN users u ON o.id_user = u.id_user 
            JOIN orderdetails od ON o.id_order = od.id_order
            JOIN product p ON od.id_product = p.id_product
            GROUP BY o.id_order
            ORDER BY order_date DESC";

    $orders = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    require_once 'views/orders.php';
}

    // Xem chi tiết đơn hàng
    public function detail() {
        if(isset($_GET['id'])) {
            $id_order = $_GET['id'];
            
            // 1. Lấy thông tin chung đơn hàng (Header)
            // Lưu ý: Đã bỏ u.address vì bảng users không có cột này
            $sql = "SELECT o.*, u.fullname, u.phone 
                    FROM `order` o 
                    JOIN users u ON o.id_user = u.id_user 
                    WHERE o.id_order = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_order]);
            $order = $stmt->fetch(PDO::FETCH_ASSOC);

            // 2. Lấy danh sách sản phẩm (Details)
            // SỬA QUAN TRỌNG: Thêm p.price vào câu lệnh SELECT bên dưới
            $sql_details = "SELECT od.*, p.name, p.price 
                            FROM orderdetails od 
                            JOIN product p ON od.id_product = p.id_product 
                            WHERE od.id_order = ?";
            $stmt2 = $this->conn->prepare($sql_details);
            $stmt2->execute([$id_order]);
            $details = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            // 3. Tính tổng tiền (Fix lỗi Undefined index: totalmoney)
            $total_money = 0;
            foreach ($details as $item) {
                $total_money += $item['price'] * $item['quantitybuy'];
            }
            // Gán ngược lại vào mảng $order để view sử dụng
            $order['totalmoney'] = $total_money;

            // Lấy ngày đặt hàng từ chi tiết (nếu bảng order không có ngày)
            if (!empty($details)) {
                $order['order_date'] = $details[0]['date'];
            }

            require_once 'views/order_detail.php';
        }
    }

    // Cập nhật trạng thái đơn hàng (Ví dụ: Chờ xử lý -> Đang giao)
    public function updateStatus() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_order'];
            $status = $_POST['status'];
            $stmt = $this->conn->prepare("UPDATE `order` SET status = ? WHERE id_order = ?");
            $stmt->execute([$status, $id]);
            header("Location: index.php?page=orders&action=detail&id=$id");
        }
    }
}
?>