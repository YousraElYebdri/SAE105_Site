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
                </tr>
            </thead>
            <tbody>
            <?php
                $nombre = $_POST['nombre'];
                $prix = $_POST['prix'];
                $nom = $_POST['nom'];
                $total = $nombre * $prix;
                
                $fichier = fopen('scripts/panier2.txt','a');     
                fwrite($fichier,"$nom|$nombre|$prix|$total|"); //ligne permettant d'écrire dans le fichier parnier2.txt'
                fclose($fichier); // Fermeture du fichier panier2.txt

                $fichier = fopen('scripts/panier2.txt','r'); // Ouverture du fichier panier2.txt en lecture
                $donnees = fread($fichier,filesize('scripts/panier2.txt')); // lecture du fichier panier2.txt jusqu'à la fin du fichier
                echo $donnees . "<br>"; 

                $lecture = explode(" ",$donnees); //les éléments de la variable donnees sont mis dans le tableau lecture en prenant comme séparateur le caractère "|"
                echo $lecture[0]; // affichage à l'écran du contenu de la première case du tableau lecture
                echo "<br>".$lecture[2]; // affichage à l'écran du contenu de la troisième case du tableau lecture
                fclose($fichier); // Fermeture du fichier panier2.txt    
?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total Général (€)</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
        <button class="continue" onclick="window.location.href='vetements/vetement.html'">Continuer vos achats</button>
    </div>
</body>

</html>