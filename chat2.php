<?php
session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'gestion_enseignement') or die(mysqli_error());

// Vérifier si l'utilisateur a déjà consulté des messages
if (!isset($_SESSION['last_read_date'])) {
    $_SESSION['last_read_date'] = date('Y-m-d H:i:s'); // Si c'est la première connexion, initialisez la date du dernier message consulté
}

// Récupérer la date du dernier message consulté par l'utilisateur
$lastReadDate = $_SESSION['last_read_date'];

// Requête SQL pour sélectionner les messages récents
$requete = "SELECT pseudo, messages FROM message WHERE date_message > '$lastReadDate' ORDER BY date_message ASC";

$res = mysqli_query($connexion, $requete);

// Afficher les messages dans un div avec une bordure
echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;margin-left: 10px;width:500px";>';

while ($row = mysqli_fetch_assoc($res)) {
    $pseudo = $row['pseudo'];
    $message = $row['messages'];

    // Afficher le pseudo suivi de ":" puis le message sur la même ligne
    echo "<h4>$pseudo:</h4> $message <br>";
}

echo '</div>';

// Mettre à jour la date du dernier message consulté par l'utilisateur à la fin de la boucle
$_SESSION['last_read_date'] = date('Y-m-d H:i:s');
?>
