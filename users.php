<?php
Class User {
    //attributes
    private $user_id;
    private $voornaam;
    private $achternaam;
    private $email;
    //constructor
    public function __construct($name,$age, $email) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }
    //method nieuwe User toevoegen
    public function setUser($voornaam, $achternaam, $email) {
      $this->voornaam = $voornaam;
      $this->achternaam = $achternaam;
      $this->email = $email;
    }
    //method User opvragen
    public function getUser($user_id){
      if(property_exists($this, $user_id)) {
          return $this->$item;
    }
}
