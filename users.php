<?php
Class User {
    
    private $user_id;
    private $voornaam;
    private $achternaam;
    private $email;

    public function __construct($name,$age, $email) {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function setUser($voornaam, $achternaam, $email) {
      $this->voornaam = $voornaam;
      $this->achternaam = $achternaam;
      $this->email = $email;
    }

    public function getUser($user_id){
      if(property_exists($this, $user_id)) {
          return $this->$item;
    }
}