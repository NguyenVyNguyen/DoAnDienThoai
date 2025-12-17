<?php
class OrderModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    // Lấy tất cả đơn hàng của một người dùng
    public function getByUserId($id_user)
    {
        $sql = "SELECT * FROM orders WHERE id_user = :id_user ORDER BY order_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_user' => $id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết đơn hàng theo ID đơn hàng
    public function getById($id_order)
    {
        $stmt = $this->conn->prepare("SELECT * FROM orders WHERE id_order = :id_order");
        $stmt->execute([':id_order' => $id_order]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tạo đơn hàng mới
    public function create($id_user, $status = "pending")
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO `order` (id_user, status)
             VALUES (:id_user, :status)"
        );
        $stmt->execute([
            ':id_user' => $id_user,
            ':status' => $status
        ]);
        $stmt = $this->conn->prepare("SELECT LAST_INSERT_ID() as id_order");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id_order'];
    }
}
