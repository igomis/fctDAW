<?php
class Database{

    // specify your own database credentials
    private $host = "mysql";
    private $db_name = "fctDAW";
    private $username = "root";
    private $password = "root";
    private $conn;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
            $this->conn = null;
        }
    }

    // get the database connection

    /**
     * @return Object|null
     */
    public function getConnection(){
        return $this->conn;
    }
}

