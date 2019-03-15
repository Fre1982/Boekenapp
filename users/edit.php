<?php

require_once 'incl/functions.php';

// check if post is send
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  var_dump($_POST);
    //die();
  if(isset($_POST['voornaam'])){

    $id = empty($_POST['id']) ? '' : escape($_POST['id']);
    $voornaam = empty($_POST['voornaam']) ? '' : escape($_POST['voornaam']);
    $naam = empty($_POST['naam']) ? '' : escape($_POST['naam']);
    if(!empty($id)){
      // connect to DB
      require_once 'db.class.php';
      $conn = new db('localhost', 'root', '', 'boekenapp');
      $conn->updateDataById("users", $id, $voornaam, $naam);


    }
    header('Location: users.php');



  // redirect to index.php
  header('Location: users.php');
  }
}

require_once 'db.class.php';
$conn = new db('localhost', 'root', '', 'boekenapp');
$klasresult = $conn->getAllData('users');

$id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "" ;
// check if post is send
if(!$id == "")
{
  require_once 'db.class.php';
  $conn = new db('localhost', 'root', '', 'boekenapp');
  $result = $conn->getDataById("users", $id);
  //var_dump($result);

  $oldName = $result['voornaam'];
  $oldFamilyname = $result['naam'];
}

include_once 'incl/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <h1 class="text-center">Update student</h1>
      <form action="" method="POST">
        <div class="form-group">
          <label for="task">Student update</label>
          <input type="voornaam" class="form-control" id="voornaam" placeholder="Update voornaam" name="voornaam" value="<?php echo $oldName; ?>">
          <br>
          <input type="naam" class="form-control" id="naam" placeholder="Update naam" name="naam" value="<?php echo $oldFamilyname; ?>">
          <br>
          <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>



<?php
include_once 'incl/footer.php';
?>
