<?php
$totalGeneral = 0;

// Chemin du fichier panier
$fichier = 'scripts/panier2.txt';

// Vérifier si des données POST sont envoyées pour vider le panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'vider') {
    if (file_exists($fichier)) {
        file_put_contents($fichier, ''); // Vide le fichier
    }
}

// Vérifier si des données POST sont envoyées pour ajouter un article au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nom'], $_POST['prix'], $_POST['nombre'])) {
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prix = floatval($_POST['prix']);
    $quantite = intval($_POST['nombre']);

    // Vérifie que les données sont valides
    if (!empty($nom) && $prix > 0 && $quantite > 0) {
        // Format des données : nom|quantite|prix
        $ligne = "$nom|$quantite|$prix" . PHP_EOL;

        // Ajouter l'article dans le fichier panier
        file_put_contents($fichier, $ligne, FILE_APPEND | LOCK_EX);
    }
}
?>

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
    <link rel="stylesheet" href="styles/stylePanier.css">
    <title>MMI Sports de glisse</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
</head>

<body>

    <nav class="menu-info">
        <ul class="right-info">
            <li><a href="#"><i class="fa-solid fa-eye-low-vision"></i></a></li>
            <li><a href="#"><img src="../images/royaume-uni.png" alt="anglais" class="langue"></a></li>
        </ul>
    </nav>
    <nav class="menu">
        <ul class="left">
            <li>
                <a href="index.html">
                    <img src="images/favicon.png" alt="Logo" class="logo">
                </a>
            </li>
            <li><a href="index.html">MMI SDG</a></li>
        </ul>

        <ul class="center">
            <li><a href="vetements/vetement.html">Vêtements</a></li>
            <li><a href="accessoire/accessoire.html">Accessoire</a></li>
            <li><a href="tutoriel.html">Tutoriel</a></li>
        </ul>

        <ul class="right">
            <li><a href="panier.php"><i class="fa-solid fa-bag-shopping"></i></a></li>
            <li><a href="contact.html">À propos</a></li>
        </ul>
    </nav>

    <h1>Votre Panier</h1>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Article</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire (€)</th>
                    <th>Sous-total (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Lire et afficher le contenu du fichier panier
                if (file_exists('scripts/panier2.txt') && filesize('scripts/panier2.txt') > 0) {
                    $fichier = fopen('scripts/panier2.txt', 'r');
                    while (($ligne = fgets($fichier)) !== false) {
                        $data = explode('|', trim($ligne));
                        if (count($data) === 3) {
                            list($nom, $quantite, $prix) = $data;
                            $sousTotal = intval($quantite) * floatval($prix);

                            echo "<tr>
                                    <td>" . htmlspecialchars($nom) . "</td>
                                    <td>" . intval($quantite) . "</td>
                                    <td>" . number_format(floatval($prix), 2) . " €</td>
                                    <td>" . number_format($sousTotal, 2) . " €</td>
                                  </tr>";

                            $totalGeneral += $sousTotal;
                        }
                    }
                    fclose($fichier);
                } else {
                    echo "<tr><td colspan='4'>Votre panier est vide.</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total Général (€)</strong></td>
                    <td><strong><?php echo number_format($totalGeneral, 2); ?> €</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="container-buttons">
            <!-- Bouton pour continuer les achats -->
            <a class="continue" href="vetements/vetement.html">Continuer vos achats</a>

            <!-- Bouton pour vider le panier -->
            <form action="panier.php" method="post" style="display: inline-block;">
                <input type="hidden" name="action" value="vider">
                <button class="vider" type="submit">Vider le panier</button>
            </form>
        </div>
    </div>
</body>

</html>