<?php
  $id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "";
  var_dump($id);
  if(!$id == ""){

    require_once 'db.class.php';
    $conn = new db('localhost', 'root', '', 'boekenapp');
    $conn->deleteDataById("users", $id);


  }
  header('Location: users.php');
 ?>
