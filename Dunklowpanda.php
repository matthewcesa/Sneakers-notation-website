<?php
    session_start();
    $_SESSION['chaussure'] = "Dunk low panda";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneakers.css" >
    <title>Dunk low panda</title>
</head>
<body>
<section class="top-page">
        <header class="header">
            <div id="leftbox">
                <h1 class="titre" id="titre"><a class="title" href="Page_d_acceuil.php">SneakerAdvisor</a>  </h1>
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
    <h1 class="titre"> Nike dunk low panda</h1>
    <section class="contenu">

        <div class="gauche">
            <img src="https://www.sneakers-actus.fr/wp-content/uploads/2021/01/Nike-Dunk-Low-Retro-Panda-White-Black-2021-DD1391-100.jpg" class="img">
        </div>

        <div class="droite">
            <h2 class="titre"> Nike Dunk Low retro B&W alias "Dunk low panda"</h2>
            <div>
                <p> Également connue sous le nom de “Panda”, cette Nike Dunk Low présente une esthétique intemporelle. En effet, la silhouette de Peter Moore affiche une tige en cuir blanc, ainsi que des superpositions en cuir noir. On retrouve également un branding rétro sur la languette, de même qu’une broderie NIKE sur le talon. Une semelle blanche, associée à une outsole noire, couronne l’ensemble.</p>
            </div>
            <div>
                <p>Dévoilée aux côtés des coloris UNLV et Sail Coast, cette Dunk Low se joint à la line-up de janvier, avec un coloris efficace pour commencer l'année !

La Nike Dunk Low Black White arbore une tige en cuir blanc, rehaussée par des empiècements en cuir noir pour un contraste tout en sobriété. On retrouve un branding NIKE sur la languette et l'outsole. Le jeu de couleur Black & White se poursuit également sur les semelles de la silhouette.
Dans une version misant sur la simplicité, cette nouvelle édition complète à merveille la gamme des Dunk Low, habituée des couleurs plus chaudes et originales !</p>
            </div>
            <div class="bas">
                <ul>
                    <li>prix: ~235-310</li>
                    <li>modèle: Blanc/Noire</li>
                    <li>marque: Nike</li>
                    <li>catégorie: lifestyle/basketball</li>
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