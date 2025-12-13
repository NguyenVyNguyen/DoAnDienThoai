<?php
class KH_CartController
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

        //

        // Load View
        require_once 'views/Cart.php';
    }

    public function addToCart()
    {
        if (isset($_POST['id_product'])) {
            $product_id = $_POST['id_product'];

            // Kiểm tra nếu giỏ hàng đã tồn tại trong session
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Thêm sản phẩm vào giỏ hàng hoặc tăng số lượng nếu đã tồn tại
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id] += 1; // Tăng số lượng
            } else {
                $_SESSION['cart'][$product_id] = 1; // Thêm sản phẩm mới với số lượng 1
            }
        }

        // Chuyển hướng về trang trước đó hoặc trang giỏ hàng
        header("Location: index.php?page=Dashboard");
        exit();
    }
}
