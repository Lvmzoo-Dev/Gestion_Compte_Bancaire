<?php
require_once("connexion.php");

function ajoutClient($nom, $prenom, $adresse, $telephone, $dateNaiss, $password, $mail)
{
    global $connexion;
    $sql = "INSERT INTO client 
            VALUES (NULL,'$nom','$prenom','$adresse','$telephone','$dateNaiss','$password','$mail')";
    $resultat = mysqli_query($connexion, $sql);
}

function ajoutCompte($idClient, $solde)
{
    global $connexion;
    $sql = "INSERT INTO compte
            VALUES (NULL,'$solde','$idClient')";
    $resultat = mysqli_query($connexion, $sql);
}

function getCompte($idCompte)
{
    global $connexion;
    $sql = "SELECT * FROM compte WHERE id='$idCompte'";
    $resultat = mysqli_query($connexion, $sql);
    return $resultat;
}

function updateCompte($idCompte, $solde)
{
    global $connexion;
    $sql = "UPDATE compte 
            SET solde = '$solde'
            WHERE id = '$idCompte'";
    mysqli_query($connexion, $sql);
}
