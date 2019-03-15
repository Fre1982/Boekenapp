<?php

require_once '../users/incl/functions.php';

// check if post is send
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
  var_dump($_POST);
    //die();
  if(isset($_POST['titel'])){

    $id = empty($_POST['id']) ? '' : escape($_POST['id']);
    $titel = empty($_POST['titel']) ? '' : escape($_POST['titel']);
    $isbn = empty($_POST['isbn']) ? '' : escape($_POST['isbn']);
    if(!empty($id)){
      // connect to DB
      require_once 'db.class.php';
      $conn = new db('localhost', 'root', '', 'boekenapp');
      $conn->updateDataById("boeken", $id, $titel, $isbn);


    }
    header('Location: boek.php');



  // redirect to index.php
  header('Location: boek.php');
  }
}

require_once 'db.class.php';
$conn = new db('localhost', 'root', '', 'boekenapp');
$klasresult = $conn->getAllData('boeken');

$id = isset($_GET['id']) && !empty($_GET['id']) ? $_GET['id'] : "" ;
// check if post is send
if(!$id == "")
{
  require_once 'db.class.php';
  $conn = new db('localhost', 'root', '', 'boekenapp');
  $result = $conn->getDataById("boeken", $id);
  //var_dump($result);

  $oldTitle = $result['titel'];
  $oldIsbn= $result['isbn'];
}

include_once '../users/incl/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-8 offset-2">
      <h1 class="text-center">Update Book</h1>
      <form action="" method="POST">
        <div class="form-group">
          <label for="task">Book update</label>
          <input type="text" class="form-control" id="titel" placeholder="Update titel" name="titel" value="<?php echo $oldTitle; ?>">
          <br>
          <input type="text" class="form-control" id="isbn" placeholder="Update isbn" name="isbn" value="<?php echo $oldIsbn; ?>">
          <br>
          <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>



<?php
include_once '../users/incl/footer.php';
?>
