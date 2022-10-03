<?php

$host = "127.0.0.1";
$user = "root";
$password = '';
$bd = "keurmassarbank";


try {
    $connexion = mysqli_connect($host, $user, $password, $bd);
    //CHAINE DE CONNEXION
    //echo " CONNEXION REUSSI";
    //var_dump($connexion);
} catch (Exception $e) {
    echo " ERREUR DE CONNEXION A LA BASE DE DONNEE";
}
