<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez que tous les champs nécessaires sont présents
    if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['nombre'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prix = (float)$_POST['prix'];
        $nombre = (int)$_POST['nombre'];
        $total = $nombre * $prix;

        // Ligne à ajouter au fichier
        $ligne = "{$nom}|{$nombre}|{$prix}|{$total}|" . PHP_EOL;

        // Ouvrez le fichier en mode ajout
        $fichier = 'panier2.txt';
        if (file_put_contents($fichier, $ligne, FILE_APPEND | LOCK_EX)) {
            // Redirection vers la page du panier après l'ajout
            header('Location: http://localhost:8000/panier.php');
            exit;
        } else {
            die('Erreur : Impossible d\'écrire dans le fichier.');
        }
    } else {
        die('Erreur : Tous les champs ne sont pas remplis.');
    }
} else {
    die('Erreur : Requête invalide.');
}
?>