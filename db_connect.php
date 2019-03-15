<?php

class db
{
    protected $conn;

    public function __construct($host="localhost", $username = "root", $password = "")
    {
        try {


            $this->conn = new PDO("mysql:host=localhost;dbname=boekenapp", "root", '');

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
