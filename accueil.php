<?php

session_start();
require_once("connexion.php");
$mail = $_SESSION['mail'];
$sql = "SELECT * FROM client
        WHERE mail = '$mail'";
$requete = mysqli_query($connexion, $sql);
$cli = mysqli_fetch_row($requete);

$idClient = $cli[0];

$sql2 = "SELECT * FROM compte
        WHERE idCli = '$idClient'";
$requete2 = mysqli_query($connexion, $sql2);

if (isset($_POST['ouvrir'])) {
    $_SESSION['id'] = $cli[0];
    header('location:ajoutCompte.php');
}

if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header("location:index.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>ACCUEIL | KEURMASSARBANK</title>
</head>

<body>
    <div class="container jumbotron mt-5" style="font-family: 'Times New Roman'">
        <p class="display-4" style="text-align: center; border-bottom: double 5px">ACCUEIL</p>
        <p style="display:inline-block;">
            <?php echo "NOM: <b>", $cli[1], "</b><br>"; ?>
            <?php echo "PRENOM: <b>", $cli[2], "</b><br>"; ?>
            <?php echo "TELEPHONE: <b>", $cli[4], "</b><br>"; ?>
        </p>
        <p style="text-align: right; display:inline-block; margin-left:60%;">
            <?php echo "DATE DE NAISSANCE: <b>", date('d/m/Y', strtotime($cli[5])), "</b><br> "; ?>
            <?php echo "ADRESSE: <b>", $cli[3], "</b><br>"; ?>
            <?php echo "EMAIL: <b>", $cli[7], "</b><br> "; ?>
        </p>
        <br>
        <form action="" method="POST">
            <button class="btn btn-outline-danger" type="submit" name="ouvrir" style="text-align: left;">Ouvrir un Compte</button>
            <button class="btn btn-primary" name="deconnexion" style="margin-left:800px; text-align: right;">Déconnexion</button>
        </form>
        <table class="table table-hover mt-5 mb-5" style="text-align: center;">
            <thead>
                <tr class="table-info">
                    <th scope="col">Numero Compte</th>
                    <th scope="col">Solde Compte</th>
                    <th scope="col">Action(s)</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($compte = mysqli_fetch_row($requete2)) : ?>
                    <tr>
                        <td><?php echo "C00", $compte[0]; ?></td>
                        <td><?= $compte[1] . " FCFA" ?></td>
                        <td>
                            <form action="" method="POST">
                                <a name="depot" href="?page=depot&id=<?= $compte[0] ?>" class="btn btn-primary">Dépot</a>
                                <a name="virement" href="?page=virement&id=<?= $compte[0] ?>" class="btn btn-success">Virement</a>
                                <a name="supprimer" href="?page=supprimer&id=<?= $compte[0] ?>" class="btn btn-danger">Supprimer</a>
                            </form>
                        </td>
                    </tr>
                    <?php

                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == "depot") {
                            $_SESSION['idCompte'] = $_GET['id'];
                            header('location:depot.php');
                        }
                        if ($_GET['page'] == "virement") {
                            $_SESSION['idCompte'] = $_GET['id'];
                            header('location:virement.php');
                        }
                        if ($_GET['page'] == "supprimer") {
                    ?>
                            <script>
                                alert("COMPTE SUPPRIME AVEC SUCCES !!");
                            </script>
                    <?php
                            $_SESSION['idCompte'] = $_GET['id'];
                            $id = $_GET['id'];
                            $req = "DELETE FROM compte WHERE id=$id";
                            mysqli_query($connexion, $req);
                            header('location:accueil.php');
                        }
                    }

                    ?>

                <?php endwhile ?>
            </tbody>
        </table>
    </div>

</body>

</html>