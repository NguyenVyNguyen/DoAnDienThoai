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
        // $sql = "SELECT *
        //     FROM orderdetails od
        //     JOIN product p ON od.id_product = p.id_product
        //     JOIN `order` o ON od.id_order = o.id_order
        //     WHERE o.id_user = :id_user
        //     ORDER BY od.date ASC";
        $sql = "SELECT o.id_order, o.id_user, o.status, sum(quantitybuy) as totalbuy,
                   MAX(od.date) as order_date, 
                   SUM(od.quantitybuy * p.price) as totalmoney
            FROM `order` o 
            JOIN users u ON o.id_user = u.id_user 
            JOIN orderdetails od ON o.id_order = od.id_order
            JOIN product p ON od.id_product = p.id_product
            where o.id_user = :id_user
            GROUP BY o.id_order
            ORDER BY order_date DESC";

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

    public function getByOrderId($id_order)
    {
        $sql = "SELECT od.*, price, image, name, o.status
            FROM orderdetails od
            JOIN product p ON od.id_product = p.id_product
            JOIN `order` o ON od.id_order = o.id_order
            WHERE od.id_order = :id_order";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id_order' => $id_order]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancelOrderDetail($id_order, $id_product)
    {
        // $stmt = $this->conn->prepare(
        //     "UPDATE orderdetails 
        //      SET status = 'Đã huỷ' 
        //      WHERE id_order = :id_order AND id_product = :id_product"
        // );
        $stmt = $this->conn->prepare(
            "DELETE FROM orderdetails 
             WHERE id_order = :id_order AND id_product = :id_product"
        );
        return $stmt->execute([
            ':id_order'   => $id_order,
            ':id_product' => $id_product
        ]);
    }

    public function updateOrderStatus($id_order, $status)
    {
        $stmt = $this->conn->prepare(
            "UPDATE `order` 
             SET status = :status 
             WHERE id_order = :id_order"
        );
        return $stmt->execute([
            ':status'   => $status,
            ':id_order' => $id_order
        ]);
    }
}
