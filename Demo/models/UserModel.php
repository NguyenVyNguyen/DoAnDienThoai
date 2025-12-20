<?php
class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    // ✅ LOGIN: dùng password_verify
    public function login($username, $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE username = :username"
        );
        $stmt->execute([':username' => $username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // kiểm tra tồn tại user + mật khẩu đúng
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function getProfile($user_id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE id_user = :id"
        );
        $stmt->execute([':id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ✅ SIGN UP: hash password trước khi lưu
    public function logup($fullname, $username, $email, $phone, $pass)
    {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO users (fullname, username, email, phone, password)
             VALUES (:fullname, :username, :email, :phone, :pass)"
        );

        $stmt->execute([
            ':fullname' => $fullname,
            ':username' => $username,
            ':email'    => $email,
            ':phone'    => $phone,
            ':pass'     => $hashedPass
        ]);

        // đăng nhập luôn sau khi đăng ký
        return $this->login($username, $pass);
    }

    public function updateProfile($id_user, $fullname, $email, $phone)
    {
        $stmt = $this->conn->prepare(
            "UPDATE users 
             SET fullname = :fullname, email = :email, phone = :phone 
             WHERE id_user = :id_user"
        );

        return $stmt->execute([
            ':fullname' => $fullname,
            ':email'    => $email,
            ':phone'    => $phone,
            ':id_user'  => $id_user
        ]);
    }

    public function changePassword($id_user, $currentPassword, $newPassword)
    {
        $hashedPass = password_hash($newPassword, PASSWORD_DEFAULT);

        if (!$this->login($_SESSION['user']['username'], $currentPassword)) {
            return false; // Mật khẩu hiện tại không đúng
        }

        $stmt = $this->conn->prepare(
            "UPDATE users 
             SET password = :password 
             WHERE id_user = :id_user"
        );

        return $stmt->execute([
            ':password' => $hashedPass,
            ':id_user'  => $id_user
        ]);
    }
}
