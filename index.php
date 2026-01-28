<?php

include('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

$pdo = new PDO($dsn,$dbUser,$dbPass);

$sql = "SELECT HAVE.Id
              ,HAVE.NameRollerCoaster
              ,HAVE.NameAmusementPark
              ,HAVE.Country
              ,HAVE.TopSpeed
              ,HAVE.Height
              ,HAVE.BuildYear
        FROM  Rollercoaster AS HAVE
        ORDER BY HAVE.Height DESC";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

var_dump($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD-Basics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-sRIl4kxIlFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="container mt-3">
      
      <div>
        <div class="col-8">
          <h3>Hoogste achtbanen van Europa</h3>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-8">
          <table class="table table-striped table-hover">
            <thead>
              <th>Naam Achtbaan</th>
              <th>Naam Pretpark</th>
              <th>Land</th>
              <th>Topsnelheid (km/u)</th>
              <th>Hoogte (m)</th>
              <th>Bouwjaar</th>
            </thead>
            <tbody>
              <?php foreach ($result as $rollercoaster) : ?>
                <tr>
                  <td><?= $rollercoaster->NameRollerCoaster ?></td>
                  <td><?= $rollercoaster->NameAmusementPark ?></td>
                  <td><?= $rollercoaster->Country ?></td>
                  <td><?= $rollercoaster->TopSpeed ?></td>
                  <td><?= $rollercoaster->Height ?></td>
                  <td><?= $rollercoaster->BuildYear ?></td>
                </tr>
              <?php endforeach; ?>
          </table>
        </div>
      </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcyN3nv7wiPVlz7YYwJrWvCXK/BmnVDxM+D2scQbITxI" 
            crossorigin="anonymous">
    </script>
  </body>
</html>