<?php
require_once 'db_connect.php';
$db1 = new db('localhost', 'root', '', 'boekenapp');
$result = $db1->getAllData('boeken');
//var_dump($result);
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="container">
        <h1>Boeken verhuur</h1>
      <div class="row">

        <div class="lg-2 offset-5 text-center">
          <button type="button" name="gebruikers" onclick="window.location.href = 'users/users.php';">Gebruikers beheren</button><br>
          <a href="add.php"><button type="button" name="boeken">Boeken toevoegen</button></a><br>


          <table><thead>
            <th scope="row"><?php echo "Boek_id"?></th>
            <th scope="row"><?php echo "Titel"?></th>
            <th scope="row"><?php echo "Verhuurd"?></th>
          </thead>
            <tbody>

                  <?php foreach ($result as $key): ?>
                      <tr>

                          <td><?php echo $key['boek_id']?></td>
                          <td><?php echo $key['titel']?></td>
                          <td><?php echo $key['verhuurd']."<br>"?></td>


                      </tr>

                  <?php endforeach; ?>
                </tbody>










          </table>



        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
