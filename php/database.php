<?php

class Database{
    private $host = 'localhost';
    private $dbname = 'socialmediaapp';
    private $username = 'root';
    private $password = '';

    private $dbConnection;
    public function __construct()
    {
        $this->dbConnection = new mysqli($this->host,$this->username,$this->password,$this->dbname);
        if($this->dbConnection->connect_error)
        {
            die("Connection failed: " . $this->dbConnection->connect_error);
        }
    }

    public function actionQuery($queryStr)
    {
        try {
            $result = $this->dbConnection->query($queryStr);

            return '';
        } catch (mysqli_sql_exception $e) {
            #echo "Query error: " . $e->getMessage();
            return $e->getMessage();
        }
          
    }
    public function __destruct()
    {
        $this->dbConnection->close();
    }

};

?>