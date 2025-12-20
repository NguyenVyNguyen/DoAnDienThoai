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

    // Insert order details
    public function create($id_order, $id_product, $quantity)
    {

        $stmt = $this->conn->prepare(
            "INSERT INTO orderdetails (id_order, id_product, quantitybuy, date)
             VALUES (:id_order, :id_product, :quantity, CURDATE())"
        );
        return $stmt->execute([
            ':id_order'   => $id_order,
            ':id_product' => $id_product,
            ':quantity'   => $quantity
        ]);
    }
}
