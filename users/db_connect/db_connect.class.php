<?php

class db_connect
{
    //this property can be changed from outside the class
    public $host;
    //this property can be changed from an extended class or within the class
    protected $db;
    //this property can only be changed by a function inside the class
    private $user, $pass;
}

//extends the DB_CONNECT class to gain acces to the protected properties
class db_connect_alternative extends db_connect
{
  //this function is to gain acces to the protected properties
  public function setDB($value)
  {
    $this->db = $value;
  }
  //this function returns the value stored in the db property
  public function getDB()
  {
    return $this->db;
  }
}
