<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Récapitulatif</h1>
    <p>Civilité : <?php echo $civilite ?></p>
    <p>Nom : <?php echo $nom ?></p>
    <p>Prénom : <?php echo $prenom ?></p>
    <p>Adresse : <?php echo $adresse ?></p>
    <p>Date de Naissance : <?php echo $datenaissance ?></p>
    <p>Adresse mail : <?php echo $mail ?></p>
    <p>Sport pratiqué  : 
        <?php foreach ($sport as $element){
        echo $element . ' ';
        } ?>
    </p>
</body>
</html>