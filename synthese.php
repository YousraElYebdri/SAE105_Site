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
    <p> Civilité : <?php echo htmlspecialchars($civilite); ?></p>
    <p> Nom : <?php echo htmlspecialchars($nom); ?></p>
    <p> Prénom : <?php echo htmlspecialchars($prenom); ?></p>
    <p> Adresse : <?php echo htmlspecialchars($adresse); ?></p>
    <p> Date de Naissance : <?php echo htmlspecialchars($datenaissance); ?></p>
    <p> Adresse mail : <?php echo htmlspecialchars($mail); ?></p>
    <p> Sport pratiqué : 
        <?php 
            if (!empty($sport)) {
                foreach ($sport as $element) {
                    echo htmlspecialchars($element) . ' ';
                }
            } else {
                echo 'Aucun sport sélectionné';
            }
        ?>
    </p>
    <p class="highlight">Zone sélectionnée : <?php echo htmlspecialchars($zoneSelectionnee); ?></p>

    <?php if (!empty($zoneSelectionnee)) { 
        // Mapping des zones avec leurs codes pour l'API Météo-France
        $zonesCode = [
            "Thonon-les-bains" => "742810",
            "Annemasse" => "740120",
            "Annecy" => "740100",
            "Aix-les-bains" => "730080",
            "Albertville" => "730110",
            "Chambéry" => "730650",
            "Grenoble" => "381850",
            "Briançon" => "050230"
        ];

        // Récupérer le code de la zone sélectionnée
        $codeZone = $zonesCode[$zoneSelectionnee] ?? null;

        if ($codeZone) { ?>
            <div class="meteo">
                <iframe 
                    id="widget_autocomplete_preview" 
                    width="560" 
                    height= auto
                    frameborder="0" 
                    src="https://meteofrance.com/widget/prevision/<?php echo $codeZone; ?>##673b8d"
                    title="Prévisions <?php echo htmlspecialchars($zoneSelectionnee); ?> par Météo-France"
                    style="border: 0px solid #10658E;border-radius: 8px">
                </iframe>
            </div>
        <?php } else { ?>
            <p>Impossible d'afficher la météo pour cette zone.</p>
        <?php } ?>
    <?php } else { ?>
        <p>Aucune zone sélectionnée pour afficher la météo.</p>
    <?php } ?>
</section>
</body>
</html>