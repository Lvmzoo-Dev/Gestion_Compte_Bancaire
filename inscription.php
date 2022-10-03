<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>PAGE D'INSCRIPTION</title>
</head>

<body>
    <div class="col-md-8 offset-3 mt-5">
        <div class="card col-md-8">
            <div class="card-header bg-dark">
                <h3 style="text-align:center; color:white">Formulaire d'inscription</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="col-md-8 offset-2 mt-5">

                    <label for="" class="">NOM</label>
                    <input type="text" required name="nom" class="form-control">

                    <label for="">PRENOM</label>
                    <input type="text" required name="prenom" class="form-control">

                    <label for="">EMAIL</label>
                    <input type="email" required name="email" class="form-control">

                    <label for="">ADRESSE</label>
                    <input type="text" required name="adresse" class="form-control">

                    <label for="">TELEPHONE</label>
                    <input type="number" required name="telephone" class="form-control">

                    <label for="">DATE DE NAISSANCE</label>
                    <input type="date" required name="dateNaiss" class="form-control">

                    <label for="">PASSWORD</label>
                    <input type="password" required name="password" class="form-control">

                    <label for="">CONFIRMED PASSWORD</label>
                    <input type="password" required name="confPassword" class="form-control">
                    <br>
                    <button type="submit" class="btn btn-outline-success" name="enregistrer">ENREGISTRER</button>
                    <a href="index.php" class="btn btn-outline-danger">ANNULER</a>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
<?php
require_once("fonctions.php");
if (isset($_POST['enregistrer'])) {
    if ($_POST['password'] != $_POST['confPassword']) {
?>
        <script>
            alert("Erreur: Les deux mots de passe sont différents !!");
        </script>
<?php
    } else {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['email'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];
        $dateNaiss = $_POST['dateNaiss'];
        $password = $_POST['password'];
        ajoutClient($nom, $prenom, $adresse, $telephone, $dateNaiss, $password, $mail);
        header('location:index.php');
    }
}

?>