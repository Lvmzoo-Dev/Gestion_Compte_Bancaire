<?php

session_start();
require_once("fonctions.php");
$compte = mysqli_fetch_row(getCompte($_SESSION['idCompte']));
if (isset($_POST['valider'])) {
    $solde = $compte[1] + $_POST['montant'];
    updateCompte($_SESSION['idCompte'], $solde);
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
    <title>DEPOT COMPTE CLIENT</title>
</head>

<body>
    <div class="col-md-8 offset-3 mt-5">
        <div class="card col-md-10">
            <div class="card-header bg-primary">
                <h3 style="text-align:center; color:white">EFFECTUER DEPOT COMPTE</h3>
            </div>
            <div class="card-body">
                <form action="" style="text-align: center;" method="POST">

                    <label for="" style="font-size: 25px;font-weight:bold;">SOLDE ACTUEL</label>
                    <input style="text-align: center;" class="form-control" type="number" required name="solde" disabled value="<?= $compte[1]; ?>">

                    <label for="" style="font-size: 25px;font-weight:bold;">MONTANT A DEPOSER</label>
                    <input class="form-control" type="number" required name="montant" placeholder="Veuillez saisir le montant à ajouter">

                    <br>
                    <button class="btn btn-success" name="valider">VALIDER</button>
                    <a class="btn btn-dark" href="accueil.php">ANNULER</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>