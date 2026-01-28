<?php
include('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
$pdo = new PDO($dsn, $dbUser, $dbPass);

$sql = "SELECT Id
              ,NameRollerCoaster
              ,NameAmusementPark
              ,Country
              ,TopSpeed
              ,Height
              ,BuildYear
        FROM Rollercoaster
        ORDER BY Height DESC";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Basics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-3">
        <div>
            <div class="col-10 text-center">
                <h3 class="text-primary">Hoogste achtbanen van Europa</h3>
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-10">
                <h6>Nieuwe achtbaan <a href="./create.php"><i class="bi bi-plus-square text-danger"></i></a></h6>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-10">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Naam Achtbaan</th>
                            <th>Naam Pretpark</th>
                            <th>Land</th>
                            <th class="text-center">Topsnelheid (km/u)</th>
                            <th class="text-center">Hoogte (m)</th>
                            <th>Bouwjaar</th>
                            <th class="text-center">Wijzig</th>
                            <th class="text-center">Verwijder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $rollercoaster): ?>
                        <tr>
                            <td><?= $rollercoaster->NameRollerCoaster; ?></td>
                            <td><?= $rollercoaster->NameAmusementPark; ?></td>
                            <td><?= $rollercoaster->Country; ?></td>
                            <td class="text-center"><?= $rollercoaster->TopSpeed; ?></td>
                            <td class="text-center"><?= $rollercoaster->Height; ?></td>
                            <td class="text-center"><?= substr($rollercoaster->BuildYear, -4); ?></td>
                            
                            <td class="text-center">
                                <a href="update.php?id=<?= $rollercoaster->Id; ?>">
                                    <i class="bi bi-pencil-square text-success"></i>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="delete.php?id=<?= $rollercoaster->Id; ?>">
                                    <i class="bi bi-x-square text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>