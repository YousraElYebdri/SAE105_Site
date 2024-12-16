<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
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
            <li><a href="#">MON COMPTE</a></li>
        </ul>
    </nav>

    <nav class="menu">
        <!-- Partie droite avec logo et nom -->
        <ul class="left">
            <li>
                <a href="index.html">
                    <img src="images/favicon.png" alt="Logo" class="logo">
                </a>
            </li>
            <li><a href="index.html">MMI SDG</a></li>
        </ul>

        <!-- Partie centrale -->
        <ul class="center">
            <li><a href="vetements/vetement.html">Vêtements</a></li>
            <li><a href="accessoire/accessoire.html">Accessoire</a></li>
            <li><a href="tutoriel.html">Tutoriel</a></li>
        </ul>    

        <!-- Partie droite -->
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fichier = 'panier2.txt';
                if (!file_exists($fichier)) {
                    file_put_contents($fichier, ''); // Crée un fichier vide
                }
                $total_general = 0;

                if (file_exists($fichier)) {
                    $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

                    foreach ($lignes as $index => $ligne) {
                        $donnees = explode('|', $ligne);

                        // Validation des données
                        if (count($donnees) >= 4) {
                            $nom = htmlspecialchars($donnees[0]);
                            $nombre = (int)$donnees[1];
                            $prix = (float)$donnees[2];
                            $total = (float)$donnees[3];
                            $total_general += $total;

                            echo "<tr>
                                    <td>{$nom}</td>
                                    <td>{$nombre}</td>
                                    <td>" . number_format($prix, 2) . "</td>
                                    <td>" . number_format($total, 2) . "</td>
                                    <td>
                                        <form action='supprimer_article.php' method='post'>
                                            <input type='hidden' name='index' value='{$index}'>
                                            <button class='delete' type='submit'>Supprimer</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='5'>Votre panier est vide.</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total Général (€)</strong></td>
                    <td><strong><?php echo number_format($total_general, 2); ?></strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <button class="continue" onclick="window.location.href='vetements/vetement.html'">Continuer vos achats</button>
    </div>
</body>

</html>