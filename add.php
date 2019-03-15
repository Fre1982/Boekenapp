<?php

require_once 'boeken.class.php';
require_once 'db_connect.php';


if($_SERVER['REQUEST_METHOD']=== 'POST'){
  $titel = empty($_POST['titel']) ? '': ($_POST['titel']);
  $ISBNNummer = empty($_POST['isbn']) ? '': ($_POST['isbn']);

$book = new boeken();
$book->addBook($titel, $ISBNNummer);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <form  action="" method="post">
        <input type="text" name="titel" value="">
        <input type="text" name="isbn" value="">
        <button type="submit" name="submit">Uitvoeren</button>
      </form>

    </div>

  </body>
</html>
