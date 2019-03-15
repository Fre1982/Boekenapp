<?php

class db
{
  protected $host, $username, $password, $dbname;

  private $conn;
  public $numOfRows;

  public function __construct($host = 'localhost', $username ='root', $password ='', $dbname ='boekenapp')
  {
    $this->host =$host;
    $this->username =$username;
    $this->password =$password;
    $this->dbname = $dbname;


    try {
    $this->conn = new PDO("mysql:host=".$this->host.";dbname=". $this->dbname, $this->username, $this->password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

  }
    public function getAllData($table=null){
      $stmt = $this->conn->prepare("SELECT * FROM ".$table);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $result = $stmt->fetchAll();
      $this->numOfRows = sizeof($result);
      return $result;

    }


    public function getDataById($table=null, $id=null){
      $sql = "SELECT * FROM ".$table." WHERE user_id=".$id;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      return $stmt->fetchAll()[0];
    }

    public function deleteDataById($table=null, $id=null){
      $stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE user_id=".$id);
      $stmt->execute();
    }

    public function addUser($table=null,$voornaam,$naam){
      $sql = "INSERT INTO ".$table."(voornaam,naam) VALUES ('".$voornaam."','".$naam."')";
      var_dump($sql);
      //die();
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    }

    public function updateDataById($table, $id, $voornaam, $naam){
      $stmt = $this->conn->prepare("UPDATE ".$table." SET voornaam = '".$voornaam."', naam = '".$naam."' WHERE user_id=".$id);
      $stmt->execute();
    }

    public function rows(){
      return $this->numOfRows;
    }


}
