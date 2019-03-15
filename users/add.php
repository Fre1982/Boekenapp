<?php

require_once 'db.class.php';
require_once 'incl/functions.php';

$conn = new db('localhost', 'root', '', 'boekenapp');
$klasresult = $conn->getAllData('users');

// check if post is send
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(isset($_POST['voornaam'])){

    $voornaam = empty($_POST['voornaam']) ? '' : escape($_POST['voornaam']);
    $naam = empty($_POST['naam']) ? '' : escape($_POST['naam']);

    // check is 'name' !empty
    if(!empty($voornaam)){
      // connect to DB
      $conn = new db('localhost', 'root', '', 'boekenapp');
      $conn->addUser("users",$voornaam,$naam);
      // redirect to index.php
      header('Location: users.php');

    }



  // redirect to index.php
  header('Location: users.php');
  }
}

include_once 'incl/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <h1 class="text-center">New student</h1>
      <form action="" method="POST">
        <div class="form-group">
          <label for="task">Name student</label>
          <input type="text" class="form-control" id="voornaam" placeholder="User voornaam" name="voornaam">
          <br>
          <label for="task">Familyname</label>
          <input type="text" class="form-control" id="naam" placeholder="User naam" name="naam">
          <br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>



<?php
include_once 'incl/footer.php';
?>
