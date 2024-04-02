<?php
    session_start(); // on commence la session
    require 'PDO.php'; // on connecte a notre base de donnees
    //on selectionne tous les avis dans la base de donnees
    $non = $db->prepare("SELECT * FROM avis WHERE chaussure = ?");
    $non->execute(array($_SESSION['chaussure']));

    $req = $db->prepare("SELECT * FROM Sneakers WHERE nom = ?");
    $req->execute(array($_SESSION['chaussure']));
    $data = $req->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avis_user.css">
    <title>Document</title>
</head>
<body>
    <section class="top-page">
        <header class="header">
            <div id="leftbox">
            <h1><a href="Page_d_acceuil.php" class="titre">SneakerAdvisor</a> </h1>
    
            </div>
            <div id="center">
                <?php require 'barre_recherche.php'; ?>
            </div>
            <div id="rightbox">
                <button onclick="window.location.href='Connexion.php';" class = "button"> Connexion</button>
                <button onclick="window.location.href='Inscription.php';" class="button">Inscription</button>
                <button onclick="window.location.href='Landing.php';" class = "button"> Votre espace</button>
            </div>
        </header>
    </section>
    <section class="center-page">
        <h2 class="hh"> Avis sur cette chaussure :</h2> 
        <?php 
                while($avis = $non->fetch()){
                        if($data['nom'] == $avis['chaussure']){
                        ?>
                                <div class="center"> 
                                    <h3>De: <?php echo $avis['pseudo']; ?> sur la <?php echo $avis['chaussure'];?></h3>
                                    <h3>Titre: <?php echo $avis['titre']?></h3>
                                    <p><?php echo $avis['contenu'];?></p>
                                    <p> <?php echo $avis['date_publication']; ?></p>
                                </div>
                    <?php   
                    
                    }
                }
                ?>

    </section>
</body>
</html>