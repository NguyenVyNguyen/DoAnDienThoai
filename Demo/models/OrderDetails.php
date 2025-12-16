<?php
class OrderDetails
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getAll($id_user)
    {
        $sql = "SELECT *
            FROM orderdetails od
            JOIN product p ON od.id_product = p.id_product
            JOIN `order` o ON od.id_order = o.id_order
            WHERE o.id_user = :id_user
            ORDER BY od.date ASC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id_user' => $id_user]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
