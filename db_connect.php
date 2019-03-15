<?php

class db
{
    protected $host, $username, $password, $dbname;
    protected $conn;


    public function __construct($host = "localhost", $username = "root", $password = "", $dbname = 'boekenapp')
    {

        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          //  echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllData($table = null)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $table);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;

      //  var_dump($result);

    }
}
