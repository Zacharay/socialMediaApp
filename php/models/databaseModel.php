<?php
class Database {
    private $host = "localhost";
    private $dbname = "socialmediaapp";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function getLastInsertId(){
        return $this->conn->lastInsertId();
    }
}

?>

?>