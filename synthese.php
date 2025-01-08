<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">
    <title>MMI SDG</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<nav class="menu-info">
        <ul class="right-info">
            <li><a href="#">MON COMPTE</a></li>
        </ul>
    </nav>

    <nav class="menu">
        <!-- Partie droite avec logo et nom -->
        <ul class="left">
            <li>
                <a href="../index.html">
                    <img src="../images/favicon.png" alt="Logo" class="logo">
                </a>
            </li>
            <li><a href="../index.html">MMI SDG</a></li>
        </ul>

        <!-- Partie centrale -->
        <ul class="center">
            <li><a href="../vetements/vetement.html">Vêtements</a></li>
            <li><a href="../accessoire/accessoire.html">Accessoire</a></li>
            <li><a href="../tutoriel.html">Tutoriel</a></li>

        </ul>

        <!-- Partie droite -->
        <ul class="right">
            <li><a href="../panier.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
            <li><a href="../contact.html">À propos</a></li>
        </ul>
    </nav>
    <section class="recapitulatif">
        <h1>Récapitulatif</h1>
        <p> Civilité : <?php echo $civilite; ?></p>
        <p> Nom : <?php echo $nom; ?></p>
        <p> Prénom : <?php echo $prenom; ?></p>
        <p> Adresse : <?php echo $adresse; ?></p>
        <p> Date de Naissance : <?php echo $datenaissance; ?></p>
        <p> Adresse mail : <?php echo $mail; ?></p>
        <p> Sport pratiqué : 
                <?php foreach ($sport as $element){
                        echo $element . ' ';
                } ?>
        </p>
        <p class="highlight">Zone sélectionnée : <?php echo htmlspecialchars($zoneSelectionnee); ?></p>
    </section>
</body>
</html>