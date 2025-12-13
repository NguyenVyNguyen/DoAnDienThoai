<?php
class UserController {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    // 1. Hiển thị danh sách
    public function index() {
        $sql = "SELECT * FROM users ORDER BY id_user DESC";
        $users = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        require_once 'views/users.php';
    }

    // 2. Thêm người dùng mới
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $roleRaw = isset($_POST['role']) ? (int)$_POST['role'] : 0;
            $role = ($roleRaw === 1) ? 1 : 0;
            // Mã hóa mật khẩu trước khi lưu
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

            $sql = "INSERT INTO users (username, password, fullname, email, phone, role) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            try {
                $stmt->execute([$username, $password, $fullname, $email, $phone, $role]);
                header("Location: index.php?page=users");
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }
    }

    // 3. Hiển thị form sửa
    public function edit() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id_user = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            require_once 'views/user_edit.php';
        }
    }

    // 4. Cập nhật người dùng
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id_user'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $roleRaw = isset($_POST['role']) ? (int)$_POST['role'] : 0;
            $role = ($roleRaw === 1) ? 1 : 0;
            
            // Kiểm tra xem có nhập mật khẩu mới không
            if (!empty($_POST['password'])) {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "UPDATE users SET fullname=?, email=?, phone=?, role=?, password=? WHERE id_user=?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$fullname, $email, $phone, $role, $password, $id]);
            } else {
                // Không đổi mật khẩu
                $sql = "UPDATE users SET fullname=?, email=?, phone=?, role=? WHERE id_user=?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$fullname, $email, $phone, $role, $id]);
            }

            header("Location: index.php?page=users");
        }
    }

    // 5. Xóa người dùng
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Không cho xóa chính mình (Admin đang đăng nhập) - Logic đơn giản kiểm tra ID
            // Ở đây giả sử ID=1 là Super Admin không được xóa
            if ($id == 1) {
                echo "<script>alert('Không thể xóa tài khoản Super Admin!'); window.location.href='index.php?page=users';</script>";
                return;
            }
            
            $stmt = $this->conn->prepare("DELETE FROM users WHERE id_user = ?");
            $stmt->execute([$id]);
            header("Location: index.php?page=users");
        }
    }
}
?>