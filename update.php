<?php
include('config/config.php');
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
$pdo = new PDO($dsn, $dbUser, $dbPass);

if (isset($_POST['submit'])) {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE Rollercoaster 
            SET NameRollerCoaster = :rollerCoaster,
                NameAmusementPark = :amusementPark,
                Country = :country,
                TopSpeed = :topSpeed,
                Height = :height,
                BuildYear = :yearOfConstruction
            WHERE Id = :id";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':rollerCoaster', $_POST['naamAchtbaan'], PDO::PARAM_STR);
    $statement->bindValue(':amusementPark', $_POST['naamPretpark'], PDO::PARAM_STR);
    $statement->bindValue(':country', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':topSpeed', $_POST['topsnelheid'], PDO::PARAM_INT);
    $statement->bindValue(':height', $_POST['hoogte'], PDO::PARAM_INT);
    $statement->bindValue(':yearOfConstruction', $_POST['bouwjaar'], PDO::PARAM_INT);
    $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);

    $statement->execute();

    $display = 'flex';
    header('Refresh:3; index.php');

} else {

    $sql = "SELECT Id, 
                   NameRollerCoaster, 
                   NameAmusementPark, 
                   Country, 
                   TopSpeed, 
                   Height, 
                   BuildYear 
            FROM Rollercoaster 
            WHERE Id = :id";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $statement->execute();

    $result = $statement->fetch(PDO::FETCH_OBJ);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Achtbaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        
        <div class="row justify-content-center" style="display:<?= $display ?? 'none'; ?>">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    De gegevens zijn gewijzigd. U wordt teruggestuurd naar de index-pagina.
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <h3 class="text-primary">Wijzig de achtbaangegevens:</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-6">
                <form action="update.php" method="POST">
                    
                    <div class="mb-3">
                        <label for="inputNaamAchtbaan" class="form-label">Naam Achtbaan:</label>
                        <input name="naamAchtbaan" type="text" class="form-control" id="inputNaamAchtbaan" 
                               value="<?= $result->NameRollerCoaster ?? $_POST['naamAchtbaan'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputNaamPretpark" class="form-label">Naam Pretpark:</label>
                        <input name="naamPretpark" type="text" class="form-control" id="inputNaamPretpark" 
                               value="<?= $result->NameAmusementPark ?? $_POST['naamPretpark'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputLand" class="form-label">Land:</label>
                        <input name="land" type="text" class="form-control" id="inputLand" 
                               value="<?= $result->Country ?? $_POST['land'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputTopsnelheid" class="form-label">Topsnelheid:</label>
                        <input name="topsnelheid" type="number" class="form-control" id="inputTopsnelheid" 
                               value="<?= $result->TopSpeed ?? $_POST['topsnelheid'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputHoogte" class="form-label">Hoogte:</label>
                        <input name="hoogte" type="number" class="form-control" id="inputHoogte" 
                               value="<?= $result->Height ?? $_POST['hoogte'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputBouwjaar" class="form-label">Bouwjaar:</label>
                        <input name="bouwjaar" type="number" min="1900" max="2099" class="form-control" id="inputBouwjaar" 
                               value="<?= $result->BuildYear ?? $_POST['bouwjaar'] ?? '' ?>">
                    </div>

                    <input type="hidden" name="id" value="<?= $result->Id ?? $_POST['id'] ?? '' ?>">

                    <div class="d-grid gap-2">
                        <button name="submit" type="submit" class="btn btn-primary btn-lg mt-2">Verstuur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>