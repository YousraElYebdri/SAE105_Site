<?php

    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $sport = [];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $civilite = $_POST['civilite'];
    $datenaissance = $_POST['datenaissance'];

$compteur=0;

if (isset($_POST[ 'ski'])){
    $compteur++;
    $sport['SKI']= $_POST['ski'];
}
if(isset($_POST[ 'sup'])){
    $compteur++;
    $sport['SUP']= $_POST['sup'];
}
if(isset($_POST[ 'pav'])){
    $compteur++;
    $sport['Planche à voile']= $_POST['pav'];
}

    include('../synthese.php')

?>