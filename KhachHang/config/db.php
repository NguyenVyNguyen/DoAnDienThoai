<?php
class Database {
    public static function connect() {
        $host = 'localhost';
        $dbname = 'doandt_schema'; // Tên database của bạn
        $username = 'root';
        $password = '123456';      // Mật khẩu (XAMPP để trống)

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            die("Lỗi kết nối CSDL: " . $e->getMessage());
        }
    }
}
?>