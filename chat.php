<?php
session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'gestion_enseignement') or die(mysqli_error());

if (isset($_POST['envoye'])) {
    $pseudo = $_SESSION['pseudo'];
    $messa = mysqli_real_escape_string($connexion, $_POST["mess"]);

    if (!empty($messa)) {
        $requete = "INSERT INTO message(pseudo, messages, date_message) VALUES('$pseudo', '$messa', NOW())";
        $res = mysqli_query($connexion, $requete);

        if ($res === false) {
            die("Erreur SQL: " . mysqli_error($connexion));
        }
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
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header, footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            width: 100%;
        }

        main {
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px; /* Ajout d'une marge pour éviter le chevauchement avec le header */
            margin-bottom: 50px; /* Ajout d'une marge pour éviter le chevauchement avec le footer */
        }

        #f {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 10px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        form label {
            margin-bottom: 5px;
        }

        #mess {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body class="body-ens">
    <header><h1><a href="index.html">dy<span>a</span>l</a></h1></header>
    <main>
        <section id="message"></section>
        <form method="post" id="f">
            <input type="text" name="mess" placeholder="Type your message">
            <input type="submit" value="Envoyer" name="envoye">
        </form>
    </main>
    <footer>
        <p>Tous droits réservés DY<span>A</span>L &copy; 2023</p>
        <div class="contact">
            <a href="https://www.microsoft.com/fr-fr/microsoft-365/outlook/email-and-calendar-software-microsoft-outlook" target="_blank"><i class="fa-solid fa-envelope"></i></a>
            <a href="https://www.whatsapp.com/?lang=fr_FR" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/?locale=fr_FR" target="_blank"><i class="fa-brands fa-facebook" ></i></a>
        </div>
    </footer>
    <script>
        setInterval(load_message, 500);

        function load_message() {
            $('#message').load('chat2.php');
        }
    </script>
</body>
</html>


