<?php
session_start();
require_once("fonctions.php");
$idClient = $_SESSION['id'];
if (isset($_POST['valider'])) {
    $solde = $_POST['solde'];
    ajoutCompte($idClient, $solde);
    header('location:accueil.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>CREATION COMPTE CLIENT</title>
</head>

<body>
    <div class="col-md-8 offset-3 mt-5">
        <div class="card col-md-10">
            <div class="card-header bg-primary">
                <h3 style="text-align:center; color:white">NOUVEAU COMPTE</h3>
            </div>
            <div class="card-body">
                <form action="" style="text-align: center;" method="POST">

                    <label for="" style="font-size: 25px;font-weight:bold;">SOLDE</label>
                    <input class="form-control" type="number" required name="solde" placeholder="Entrer le solde">

                    <br>
                    <button type="submit" class="btn btn-success" name="valider">VALIDER</button>
                    <a class="btn btn-dark" href="accueil.php">ANNULER</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<?php

if (isset($_POST['valider'])) {
    $solde = $_POST['solde'];
}

?>