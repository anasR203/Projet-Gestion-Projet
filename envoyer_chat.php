<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user_id'])){
    header("Location: login_enseignant.php");
    exit;
}


$connexion=mysqli_connect('localhost','root','','gestion_enseignement') or die(mysqli_error());
$id=$_SESSION['user_id'];
$requete="SELECT libelle_mat 
          FROM enseigne,matiere 
          WHERE matiere.CODE_MAT=enseigne.CODE_MAT 
          AND enseigne.ID_enseignant=$id";


$res=mysqli_query($connexion,$requete);





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
    <header>
        <table><tr><td>
        <h1><a href="#">dy<span>a</span>l</a></h1></td>
       <DIV>BIENVENUE,MR <?php echo $_SESSION['user_id'];?></DIV></a>
   </td></tr></table>
</form>
    </header>

    <nav class="ligne">
        <ul>
              
    <li class="menu-item">
      <a href="#">Modules</a>
      <ul class="submenu">
      <?php
              while($row=mysqli_fetch_assoc($res)){
                 echo " <li><a href=#>{$row['libelle_mat']}</a></li>";
              }
            ?>  
       
      </ul>
    </li>

          
          <li class="menu-item">
            <a href="#">Deconnexion</a>
            <ul class="submenu">
              <a href="deconnexion.php">se deconnecter</a>
        </ul>
      </nav>
<main>                      
            <div class="vop">
            <center class="iji1"><a>Bienvenue</a></center>
            <p class="pvop"></p>
            <div class="mop">
                <a href="envoyer.php" class="iji">Envoyer un cours,<br>TD et TP</a>
                <a href="Chat.php" class="iki">Accéder au chat</a>
            </div>
        </div>
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
