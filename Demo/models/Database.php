<?php
class Database {
    public static function connect() {
        $host = 'localhost';
        $dbname = 'ql_vlxd';
        $username = 'root';
        $password = ''; // Thay đổi nếu cần

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }
}
?>