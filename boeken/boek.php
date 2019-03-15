<?php

require_once 'db.class.php';

$conn = new db('localhost', 'root', '', 'boekenapp');

$result = $conn->getAllData('boeken');
$length = $conn->numOfRows;

//$klasresult = $conn->getAllData('klasnamen');


include_once '../users/incl/header.php';
?>

<div class="container">
  <h1 class="text-center">Overzicht </h1>
  <div class="row">
    <div class="col-8 offset-2">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titel</th>
            <th scope="col">ISBN</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php if($length>0): ?>
            <?php $counter=0 ; ?>

            <?php while($counter<$length) :?>
              <?php $row = $result[$counter]; ?>
              <tr>
                <th scope="row"><?php echo ($counter + 1)."/".sizeof($result); ?></th>
                <td><?php echo $row['titel']; ?></td>
                <td><?php echo $row['isbn']; ?></td>
                <td><a href="edit.php?id=<?php echo $row['boek_id']; ?>" class="btn btn-update"type="button">Edit</a></td>

              </tr>
              <?php $counter++ ; ?>

            <?php endwhile; ?>
          <?php endif; ?>
         </tr>
        </tbody>
      </table>
      <a type="button" name="Toevoegen" href="../add.php">Toevoegen</a>
      <a type="button" name="Hoofdmenu" href="../index.php">Hoofdmenu</a><br>
    </div>
  </div>
</div>


<?php
include_once '../users/incl/footer.php';
