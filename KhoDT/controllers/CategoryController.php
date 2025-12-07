<?php
class CategoryController {
    private $conn;
    public function __construct() { $this->conn = Database::connect(); }

    public function index() {
        $categories = $this->conn->query("SELECT * FROM category ORDER BY id_category DESC")->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/categories.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stmt = $this->conn->prepare("INSERT INTO category (name, brand) VALUES (?, ?)");
            $stmt->execute([$_POST['name'], $_POST['brand']]);
            header("Location: index.php?page=categories");
        }
    }

    // Hiển thị form sửa (dùng lại trang categories.php nhưng kèm biến $editCategory)
    public function edit() {
        $id = $_GET['id'];
        $editCategory = $this->conn->query("SELECT * FROM category WHERE id_category=$id")->fetch(PDO::FETCH_ASSOC);
        $categories = $this->conn->query("SELECT * FROM category ORDER BY id_category DESC")->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/categories.php'; // Load lại trang danh sách nhưng ô input sẽ có dữ liệu
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $stmt = $this->conn->prepare("UPDATE category SET name=?, brand=? WHERE id_category=?");
            $stmt->execute([$_POST['name'], $_POST['brand'], $_POST['id_category']]);
            header("Location: index.php?page=categories");
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->conn->prepare("DELETE FROM category WHERE id_category=?")->execute([$_GET['id']]);
            header("Location: index.php?page=categories");
        }
    }
}
?>