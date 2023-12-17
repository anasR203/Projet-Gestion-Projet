<?php

session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Effectuer des vérifications de connexion
    $clic = $_POST['connect'];
    $id = $_POST['ID'];
    $mtpss = $_POST['pswd'];
}

$connexion = mysqli_connect('localhost', 'root', '', 'gestion_enseignement') or die(mysqli_error());

$requete = "SELECT *
            FROM etudiant
            WHERE ID_etudiant='$id'";

$res = mysqli_query($connexion, $requete);
$row = mysqli_fetch_assoc($res);

if ($row) {
    $passwd_db = $row['Mot_de_passe'];
    $niveau = $row['niveau'];
    $pseudo = $row['pseudo'];

    if ($clic == true) {
        if ((password_verify($mtpss, $passwd_db))) {
            $_SESSION['pseudo'] = $pseudo; // Enregistrer le pseudo dans la session
            $_SESSION['ID_etudiant']=$ide;
            if ($niveau == 'L1') {
                header("Location: connexionL1.html");
                exit();
            } elseif ($niveau == 'L2') {
                header("Location: connectionl2.html");
                exit();
            } elseif ($niveau == 'L3') {
                header("Location: connectionl3.html");
                exit();
            }
        } else {
            echo "Mot de passe incorrect <table border=1><tr><td><a href=connection_Etudiant.html>Retour à la page de connexion</a></td></tr></table>";
        }
    }
} else {
    echo "ID étudiant introuvable <table border=1><tr><td><a href=connection_Etudiant.html>Retour à la page de connexion</a></td></tr></table>";
}

?>
