<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if(isset($_SESSION['user_id'])){
    header("Location: Paccueil_enseignant.php");
    exit;
}

// Vérifier si le formulaire de connexion est soumis
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Effectuer des vérifications de connexion
    $id = $_POST['identifiant'];
    $password = $_POST['password'];

    $connexion=mysqli_connect('localhost','root','','gestion_enseignement') or die(mysqli_error());

        $requete="SELECT *
          FROM enseignant
          where ID_enseignant='$id' ";


    $res=mysqli_query($connexion,$requete);
    $row=mysqli_fetch_assoc($res);


    $id_db=$row['ID_enseignant'];
    $passwd_db=$row['Mot_de_passe'];
    

    // Vérifier les informations de connexion ici (ex. vérifier dans la base de données)
    if($id === $id_db && $password === $passwd_db){
        $_SESSION['user_id'] = $id; // Enregistrer l'ID utilisateur dans la session
        header("Location: Paccueil_enseignant.php");
        exit;
    }else{
        $error = "Identifiants invalides";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Etudiant</title>
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="/favicon.png" type="image/x-icon">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="body-ens">
    <header><h1><a href="index.html">dy<span>a</span>l</a></h1></header>
<main>
    <?php if(isset($error)){ ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form  method="post" action="">
        <h4>Connexion Enseignant</h4>
        <label for="numID" >Identifiant</label><br>
        <input type="text" name="identifiant"  required><br>
        <label for="pswd">Mot de passe</label><br>
        <input type="password" name="password"  required><br>
        <input type="submit" value="Connexion">
      </form>
</main>
<footer>
        <p>
            Tous droits réservés DY<span>A</span>L  &copy; 2023
        </p>
        <div class="contact">
            <a href="https://www.microsoft.com/fr-fr/microsoft-365/outlook/email-and-calendar-software-microsoft-outlook" target="_blank"><i class="fa-solid fa-envelope"></i></a>
            <a href="https://www.whatsapp.com/?lang=fr_FR" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/?locale=fr_FR" target="_blank"><i class="fa-brands fa-facebook" ></i></a>        
        </div>
    </footer>   
</body>
</html>