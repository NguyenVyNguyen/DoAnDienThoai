<?php
class ProductDAO{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = Database::connect();
    }
    public function getAllProducts(){
        $stmt = $this->dbConnection->query("SELECT * FROM product");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function total_products(){
        $stmt = $this->dbConnection->query("SELECT COUNT(*) as total FROM product");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getProductsByCategory($category_id){
        $stmt = $this->dbConnection->prepare("SELECT * FROM product WHERE id_category = :id_category");
        $stmt->bindParam(':id_category', $category_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductById($id_product){
        $stmt = $this->dbConnection->prepare("SELECT * FROM product WHERE id_product = :id_product");
        $stmt->bindParam(':id_product', $id_product);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}