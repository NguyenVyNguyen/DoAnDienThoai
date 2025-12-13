<?php
class ProductModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    // Lấy sản phẩm kèm tên danh mục và thương hiệu
    public function getAll() {
        $sql = "SELECT p.*, c.name as cat_name, c.brand 
                FROM product p 
                JOIN category c ON p.id_category = c.id_category 
                ORDER BY p.id_product DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE id_product = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>