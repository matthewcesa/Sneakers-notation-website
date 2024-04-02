<?php
    session_start(); // on commence la session
    //on regarde si ces champs sont remplies
    if(isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($_SESSION['mail']) && !empty($_SESSION['mail']) && isset($_SESSION['tel']) && !empty($_SESSION['tel']) && isset($_SESSION['genre']) && !empty($_SESSION['genre'])){

        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="Landing.css">
            </head>
        
            <body>
            <section class="top-page">
        <header class="header">
            <div id="leftbox">
                <h1><a class="title" href="Page_d_acceuil.php">SneakerAdvisor</a>  </h1>
                <nav>
                    <a href="avis.php" class="title">Rédigez un avis</a>
                </nav>
            </div>
            <div id ="center">
                <?php require 'barre_recherche.php';?>
            </div>
            <div id="rightbox">
                <button onclick="window.location.href='parametres.php';" class = "button"> parametres</button>
                <button onclick="window.location.href='Deconnexion.php';" class="button">Déconnexion</button>
            </div>
        </header>
    </section>
        
                <div class="contenu">
                <h1>Bienvenue <?php echo $_SESSION['user'];?>!</h1>
                    <div class="profil">
        
                        <h3> Pseudo: <?php echo $_SESSION['user'];?></h3>
        
                        <h3> Mail: <?php echo $_SESSION['mail']; ?></h3>

                        <h3> Téléphone: <?php echo $_SESSION['tel']; ?></h3>

                        <h3> Genre: <?php echo $_SESSION['genre']; ?></h3>

                        <h3> Mot de passe: <?php echo $_SESSION['mdp'];?></h3>
                    </div>
                    <div>
                        <a href="avis_user.php">Les avis que vous avez rédigés</a>
                    </div>
                </div>
            </body>
        </html>
        
    <?php 
    }else {
        header('Location: Connexion.php');
    }
?>