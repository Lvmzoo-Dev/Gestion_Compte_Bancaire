<?php
require_once("connexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="col-md-8 offset-3 mt-5">
        <div class="card col-md-10">
            <div class="card-header bg-dark">
                <h3 style="text-align:center; color:white">Formulaire de Connexion</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">

                    <label for="">ADRESSE MAIL</label>
                    <input class="form-control" type="email" required name="mail" placeholder="Entrer votre mail">


                    <label for="">PASSWORD</label>
                    <input class="form-control" type="password" required name="password" placeholder="Entrer votre mot de passe">
                    <br>
                    <button type="submit" class="btn btn-success" name="connexion">CONNEXION</button>
                    <a href="inscription.php">Vous n'avez pas de compte??</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

<?php

if (isset($_POST['connexion'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM client WHERE mail = '$mail' AND password = '$password'";
    $resultat = mysqli_query($connexion, $sql);
    $client = mysqli_fetch_row($resultat);

    if ($client == null) { ?>
        <script>
            alert("ERREUR DE LOGIN OU MOT DE PASSE");
        </script>
<?php
    } else {
        session_start();
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['password'] = $_POST['password'];
        header("location:accueil.php");
    }
}


?>