<?php
class ProductController {
    private $conn;

    public function __construct() {
        // Giả sử class Database của bạn đã hoạt động tốt
        $this->conn = Database::connect();
    }

    public function index() {
        // SQL giữ nguyên vì p.* đã lấy luôn cột image rồi
        $sql = "SELECT p.*, c.name as cat_name 
                FROM product p 
                LEFT JOIN category c ON p.id_category = c.id_category 
                ORDER BY p.id_product DESC";
        $products = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

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
            $id_user = 1; 
            $status = 'Còn hàng';

            // --- XỬ LÝ UPLOAD ẢNH ---
            $image = "";
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $image = time() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
            }

            // Thêm cột image vào câu SQL
            $sql = "INSERT INTO product (id_user, id_category, name, color, price, quantity, status, warrantyperiod, image) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_user, $id_category, $name, $color, $price, $quantity, $status, $warranty, $image]);

            header("Location: index.php?page=products");
            exit();
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE id_product = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            $categories = $this->conn->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
            
            require_once 'views/product_edit.php';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_product'];
            $name = $_POST['name'];
            $id_category = $_POST['id_category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $color = $_POST['color'];
            $warranty = $_POST['warranty'];

            // 1. Lấy thông tin cũ để lấy tên ảnh cũ
            $stmtOld = $this->conn->prepare("SELECT image FROM product WHERE id_product = ?");
            $stmtOld->execute([$id]);
            $oldProduct = $stmtOld->fetch(PDO::FETCH_ASSOC);
            $imageName = $oldProduct['image']; // Mặc định giữ ảnh cũ

            // 2. Kiểm tra nếu người dùng chọn ảnh mới
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                // Xóa ảnh cũ nếu có
                if ($imageName && file_exists('uploads/' . $imageName)) {
                    unlink('uploads/' . $imageName);
                }
                // Upload ảnh mới
                $imageName = time() . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $imageName);
            }

            // 3. Cập nhật SQL kèm cột image
            $sql = "UPDATE product SET id_category=?, name=?, color=?, price=?, quantity=?, warrantyperiod=?, image=? WHERE id_product=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id_category, $name, $color, $price, $quantity, $warranty, $imageName, $id]);

            header("Location: index.php?page=products");
            exit();
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Lấy tên ảnh để xóa file khỏi thư mục
            $stmtGet = $this->conn->prepare("SELECT image FROM product WHERE id_product = ?");
            $stmtGet->execute([$id]);
            $prod = $stmtGet->fetch(PDO::FETCH_ASSOC);
            
            if ($prod && !empty($prod['image']) && file_exists('uploads/' . $prod['image'])) {
                unlink('uploads/' . $prod['image']);
            }

            // Xóa trong DB
            $stmt = $this->conn->prepare("DELETE FROM product WHERE id_product = ?");
            $stmt->execute([$id]);
            
            header("Location: index.php?page=products");
            exit();
        }
    }
}
?>