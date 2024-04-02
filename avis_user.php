<?php
    session_start(); // on commence la session
    require 'PDO.php'; // on connecte a notre base de donnees

    //on selectionne tous les avis dans la base de donnees
    $sql = $db->query("SELECT * FROM avis ORDER BY date_publication DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avis_user.css">
    <title>Avis que vous avez rédigés</title>
</head>
<body>
<section class="top-page">
        <header class="header">
            <div id="leftbox">
                <button onclick="window.location.href='Landing.php';" class ="button"> précédent </button>
                <h1><a href="Page_d_acceuil.php" class="titre">SneakerAdvisor</a>  </h1>
                <nav>
                    <a href="avis.php" class ="titre">Rédigez un avis</a>
                </nav>
            </div>
            <div id="center">
                <?php require 'barre_recherche.php'; ?>
            </div>
            <div id="rightbox">
                <button onclick="window.location.href='Connexion.php';" class ="button"> Connexion</button>
                <button onclick="window.location.href='Inscription.php';" class="button">Inscription</button>
                <button onclick="window.location.href='Landing.php';" class = "button"> Votre espace</button>
            </div>
        </header>
    </section>
    <section class = "center-page">
        
        <h3 class="hh">Avis que vous avez rédigés:</h3>
        <?php 
            while($avis = $sql->fetch()){
                if(($avis['pseudo'] == $_SESSION['user'])){?>
            <div class="center"> 
                <h3>De: vous sur la <?php echo $avis['chaussure'];?></h3>
                <h3>Titre: <?php echo $avis['titre']?></h3>
                <p><?php echo $avis['contenu'];?></p>
                <p> <?php echo $avis['date_publication']; ?></p>
            </div>
        <?php }} ?>
    </section>
</body>
</html>
