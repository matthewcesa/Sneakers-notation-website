<?php 
    session_start();
    $_SESSION['chaussure'] = "Forum low";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneakers.css" >
    <title>Forum low</title>
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
    <h1 class="titre"> Adidas Forum low</h1>
    <section class="contenu">

        <div class="gauche">
            <img src="https://www.sneakers-actus.fr/wp-content/uploads/2021/03/Adidas-Forum-84-Low-Royal-Blue-Cloud-White-2021-FY7756.jpg" class="img">
        </div>

        <div class="droite">
            <h2 class="titre"> La chaussure de basketball iconique mais en version basse</h2>
            <div>
                <p>Créée pour répondre aux besoins des joueurs, la Forum a révolutionné le monde du basket en 1984, devenant immédiatement la chaussure de basket la plus innovante de son époque. Adoptée sur les parquets, cette silhouette est très vite devenue une icône streetwear. Aujourd'hui, nous présentons l'évolution d'un modèle iconique. La Forum est de retour pour faire entendre la voix d'une nouvelle génération</p>
            </div>
            <div>
                <p>Plus qu'une chaussure, c'est un message. La chaussure adidas Forum a fait son apparition en 1984 et s'est faite remarquer sur les parquets et dans le monde de la musique. Cette chaussure classique ravive l'attitude des 80's, l'énergie explosive des parquets et l'iconique design avec une bride en X à la cheville, dans une version basse conçue pour la rue.</p>
            </div>
            <div class="bas">
                <ul>
                    <li>prix: ~100-110€</li>
                    <li>modèle: Blanche/Bleu</li>
                    <li>marque: Adidas</li>
                    <li>catégorie: Basketball</li>
                    <li>Unisexe</li>
        
                </ul>
            </div>
            <div>
                <a href="avis_sneakers.php">Avis sur cette sneakers</a>
            </div>
        </div>
    </section>
</body>
</html>