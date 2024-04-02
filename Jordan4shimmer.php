<?php
    session_start();
    $_SESSION['chaussure'] = "Jordan 4 shimmer";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneakers.css" >
    <title>Document</title>
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
    <h1 class="titre"> Air Jordan IV Shimmer</h1>
    <section class="contenu">

        <div class="gauche">
            <img src="https://www.cdiscount.com/pdt2/5/5/8/1/700x700/mp55538558/rw/air-jordan-4-retro-shimmer.jpg" class="img">
        </div>

        <div class="droite">
            <h2 class="titre"> Air Jordan IV Shimmer, une paire rayonnante</h2>
            <div>
                <p>La marque de Michael Jordan semble avoir trouvé en la Air Jordan 4 une source inépuisable d'inspiration. En effet, les déclinaisons de la silhouette iconique s'enchainent, pour le plus grand plaisir des amateurs de sneakers. En témoigne cette nouvelle venue pour l'année 2021 : la Air Jordan 4 Shimmer.La marque au Jumpman nous livre ici un modèle unique présentant un colorway "Shimmer" semblable à celui de la Air Jordan 1 Milan. L'aspect monochrome porté par une base en cuir et des détails dans des tons marron, taupe et beige confère à cette paire son aspect épuré. Les éléments de branding ainsi que le Jumpman présent sur la languette viennent parfaire le modèle.</p>
            </div>
            <div>
                <p> Conçue pour correspondre à la vitesse et à la rapidité de Kyrie Irving, la Nike Kyrie Flytrap III combine un soutien total avec un amorti réactif et une semelle extérieure agressive.  Comme d’habitude avec les modèles de Kyrie Irving, l’accent est mis sur l’adhérence, avec une imposante semelle, qui remonte bien à l’avant et sur les côtés.</p>
            </div>
            <div class="bas">
                <ul>
                    <li>prix: ~340-470</li>
                    <li>modèle: beige</li>
                    <li>marque: Jordan</li>
                    <li>catégorie: Lifestyle</li>
                    <li>Femme</li>
        
                </ul>
            </div>
            <div>
                <a href="avis_sneakers.php">Avis sur cette sneakers</a>
            </div>
        </div>
    </section>
</body>
</html>