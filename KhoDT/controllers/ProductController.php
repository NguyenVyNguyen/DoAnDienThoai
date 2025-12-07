<?php
class ProductController {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function index() {
        // Lấy danh sách sản phẩm + tên danh mục
        $sql = "SELECT p.*, c.name as cat_name 
                FROM product p 
                LEFT JOIN category c ON p.id_category = c.id_category 
                ORDER BY p.id_product DESC";
        $products = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // Lấy danh mục để hiện trong Modal thêm mới
        $categories = $this->conn->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);

        require_once 'views/products.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $id_category = $_POST['id_category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $color = $_POST['color'];
            $warranty = $_POST['warranty'];
            $id_user = 1; // ID Admin mặc định
            $status = 'Còn hàng';

            $sql = "INSERT INTO product (id_user, id_category, name, color, price, quantity, status, warrantyperiod) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_user, $id_category, $name, $color, $price, $quantity, $status, $warranty]);

            header("Location: index.php?page=products");
            exit();
        }
    }

    // Hàm hiển thị form sửa
    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE id_product = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            // Lấy danh mục để hiện trong dropdown
            $categories = $this->conn->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
            
            require_once 'views/product_edit.php';
        }
    }

    // Hàm lưu dữ liệu sau khi sửa
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_product'];
            $name = $_POST['name'];
            $id_category = $_POST['id_category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $color = $_POST['color'];
            $warranty = $_POST['warranty'];

            $sql = "UPDATE product SET id_category=?, name=?, color=?, price=?, quantity=?, warrantyperiod=? WHERE id_product=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_category, $name, $color, $price, $quantity, $warranty, $id]);

            header("Location: index.php?page=products");
            exit();
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $this->conn->prepare("DELETE FROM product WHERE id_product = ?");
            $stmt->execute([$id]);
            header("Location: index.php?page=products");
            exit();
        }
    }
}
?>