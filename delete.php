<?php

include('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
$pdo = new PDO($dsn, $dbUser, $dbPass);

$sql = "DELETE FROM HoogsteAchtbaanVanEuropa WHERE Id = :id";

$statement = $pdo->prepare($sql);

$statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

header('Refresh: 3; url=index.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Verwijderen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="alert alert-success text-center" role="alert">
                    De gegevens zijn verwijderd. U wordt teruggestuurd naar de index-pagina.
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>