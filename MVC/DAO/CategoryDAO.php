<?php
class CategoryDAO{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = Database::connect();
    }

    public function getAllCategories(){
        $stmt = $this->dbConnection->query("SELECT * FROM category");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}