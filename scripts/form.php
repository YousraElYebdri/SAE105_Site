<?php

    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
    $mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_SPECIAL_CHARS);
    $sport = filter_input(INPUT_POST, 'sport', FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
    $adresse = filter_input(INPUT_POST, 'adresse', FILTER_SANITIZE_SPECIAL_CHARS);
    $civilite = filter_input(INPUT_POST, 'civilite', FILTER_SANITIZE_SPECIAL_CHARS); 
    $datenaissance = filter_input(INPUT_POST, 'datenaissance', FILTER_SANITIZE_SPECIAL_CHARS);


    include('../synthese.php')

?>