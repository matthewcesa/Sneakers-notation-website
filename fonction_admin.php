<?php
session_start(); // on commence la session

    if(!isset($_POST['envoyer'])){ // si n on a pas appuye sur le bouton envoyer
        if(!$_SESSION['mdp']){ // si n a pas de mot de passe
            header('Location: connexion_admin.php'); // on rediriges a connexion.php
        }else{
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Page admin</title>
                <meta charset="utf-8">
            </head> 
            <body>
                <div>
                    <button onclick="window.location.href='Deconnexion.php';" class = "button"> Déconnexion </button></div>
                    <br>
                    <?php echo "Bienvenue ".$_SESSION['pseudo'].", vous êtes sur la page admin."; ?>
                <div>
                <div>
                    <a href="bannir.php">Supprimer des utilisateurs</a><br>
                    <a href="ajout_sneakers.php">Ajouter une paire de chaussures</a>
                </div>
            </body>
            </html> 
            <?php
        }
    }
   
?>
