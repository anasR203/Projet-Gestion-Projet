<?php
// Vérifier si le formulaire a été soumis
if(isset($_POST['envoyer'])){

    // Variables nécessaires pour la connexion à la base de données
    $connexion=mysqli_connect('localhost','root','','gestion_enseignement') or die(mysqli_error());

    


    // Récupérer les informations sur le fichier
    $mat=$_POST['mat'];
    $fichier=$_POST['file']['file'];
    $fichT=$_FILES['file']['tmp_name'];


        // Lire le contenu du fichier
        $fileContent = file_get_contents($fichT);

        // Préparer la requête d'insertion en base de données
        $req = $connexion->prepare("INSERT INTO td (nom, fichier) VALUES (?, ?)");
        $req->bind_param("sb", $fichier,$fichT);
        if($req->execute()){
        echo "Le fichier a été inséré dans la base de données.";
        }

        else {
        echo "Une erreur s'est produite lors de l'upload du fichier.";
    }

    // Fermer la connexion à la base de données
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours et td</title>
    <link rel="stylesheet" href="all.css">
    <link rel="icon" href="/favicon.png" type="image/x-icon">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="body-ens">
  <header>
    <table><tr><td>
        <h1><a href="Paccueil_enseignant.php">dy<span>a</span>l</a></h1></td>
      
  </td></tr><tr>
  <td> <a href=deconnexion.php>Se deconnecter</a></td>
  </tr></table>
</header>


<main>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="Matiere">Matiere</label>
         <input type="text" name="mat">

         <label for="fichier">fichier</label>
         <input type="file" name="file">
         <input type="submit" name="emvoyer" value="envoyer">

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