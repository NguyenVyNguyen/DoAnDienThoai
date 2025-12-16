<?php
class UserModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function login($phone, $password)
    {
        // Lưu ý: Trong thực tế password nên được hash (password_verify).
        // Ở đây demo so sánh trực tiếp vì dữ liệu mẫu của bạn là plain text.
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE phone = :phone AND password = :pass");
        $stmt->execute([':phone' => $phone, ':pass' => $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfile($user_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id_user = :id");
        $stmt->execute([':id' => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
