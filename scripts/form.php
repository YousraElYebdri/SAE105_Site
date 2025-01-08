<?php

    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $sport = [];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $civilite = $_POST['civilite'];
    $datenaissance = $_POST['datenaissance'];
    $zoneSelectionnee = isset($_POST['zoneSelectionnee']) ? $_POST['zoneSelectionnee'] : 'Non spécifiée';


if (isset($_POST[ 'ski'])){
    $sport['SKI Alpin']= $_POST['ski'];
}
if(isset($_POST[ 'rqt'])){
    $sport['Raquettes']= $_POST['rqt'];
}
if(isset($_POST[ 'luge'])){
    $sport['Luge']= $_POST['luge'];
}
if(isset($_POST[ 'swb'])){
    $sport['Snowboard']= $_POST['swb'];
}


    include('../synthese.php');

?>