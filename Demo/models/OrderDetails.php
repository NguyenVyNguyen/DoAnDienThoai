<?php
class OrderDetails
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getAll()
    {
        $sql = "select * from orderdetails join product on orderdetails.id_product = product.id_product
                ORDER BY orderdetails.id_order ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
