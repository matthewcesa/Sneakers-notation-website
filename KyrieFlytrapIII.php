<?php 
    session_start();
    $_SESSION['chaussure'] = "Kyrie Flytrap III";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneakers.css" >
    <title>Kyrie flytrap III</title>
</head>
<body>
<section class="top-page">
        <header class="header">
            <div id="leftbox">
                <h1 class="titre" id="titre"><a class="title" href="Page_d_acceuil.php">SneakerAdvisor</a>  </h1>
                <nav>
                    <a href="avis.php">Rédigez un avis</a>
                </nav>
            </div>
            <div id ="center">
                <?php require 'barre_recherche.php'; ?>
            </div>
            <div id="rightbox">
                
                <button onclick="window.location.href='Connexion.php';" class = "button"> Connexion</button>
                <button onclick="window.location.href='Inscription.php';" class="button">Inscription</button>
                <button onclick="window.location.href='Landing.php';" class = "button"> Votre espace</button>
            </div>
        </header>
    </section>
    <h1 class="titre"> Nike Kyrie Flytrap III</h1>
    <section class="contenu">

        <div class="gauche">
            <img src="https://de.kicksmaniac.com/zdjecia/2020/08/24/1108/17/11030sesja_21.08__41_.png" class="img">
        </div>

        <div class="droite">
            <h2 class="titre"> Kyrie Flytrap III, soyez plus rapide dans votre jeu</h2>
            <div>
                <p>Plus vos mouvements sont rapides, plus vous pourrez contrecarrer la défense efficacement. Conçue pour le jeu insaisissable de Kyrie Irving, la Kyrie Flytrap III allie maintien total du pied, amorti performant et une semelle extérieure agressive ajustée pour un mouvement sans contraintes, même dans les couloirs les plus serrés.</p>
            </div>
            <div>
                <p> Conçue pour correspondre à la vitesse et à la rapidité de Kyrie Irving, la Nike Kyrie Flytrap III combine un soutien total avec un amorti réactif et une semelle extérieure agressive.  Comme d’habitude avec les modèles de Kyrie Irving, l’accent est mis sur l’adhérence, avec une imposante semelle, qui remonte bien à l’avant et sur les côtés.</p>
            </div>
            <div class="bas">
                <ul>
                    <li>prix: ~85-100€</li>
                    <li>modèle: blanche/or metallic</li>
                    <li>marque: Nike</li>
                    <li>catégorie: Basketball</li>
                    <li>unisexe</li>
        
                </ul>
            </div>
            <div>
                <a href="avis_sneakers.php">Avis sur cette sneakers</a>
            </div>
        </div>
    </section>
</body>
</html>