<?php
    session_start();
    $_SESSION['chaussure'] = "Air force 1";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneakers.css" >
    <title>Air force 1</title>
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
    <h1 class="titre"> Nike Air force 1</h1>
    <section class="contenu">

        <div class="gauche">
            <img src="https://static1.runbabyrun.fr/articles/0/40/30/@/16444-comment-porter-des-baskets-nike-air-forc-620x0-2.jpg" class="img">
        </div>

        <div class="droite">
            <h2 class="titre">  La Nike Air Force 1, une basket tendance </h2>
            <div>
                <p> Il y a des pièces mode qui passeront les années sans jamais se démoder. C'est le cas de la Nike Air Force 1, une basket unisexe portée aujourd'hui par toutes les générations et dont l'intemporalité en fait un must-have. Chaque année, elle revient dans sa version la plus classique mais parfois dans de nouveaux coloris ou modèles pour s'adapter aux dernières tendances du moment. Dernier exemple en date, la Nike Air Force 1 Sage Low qui diffère du modèle original avec une coupe et un design entièrement revisités. La petite différence ? Une semelle plateforme on ne peut plus confortable. La Air Force 1 Shadow ainsi quel es modèles en daim rose et beige ont également beaucoup de succès cet été, même si la Nike Air Force 1 blanche reste LE best-seller de la marque américaine. </p>
            </div>
            <div>
                <p>Créée en 1982 par Bruce Kilgore, la Nike Air Force 1 est la toute première chaussure de basketball équipée de la technologie Air. La bulle d'air intégrée et cachée dans le talon offre un meilleur amorti, et sa semelle avec ses points de pivot circulaires garantit une parfaite stabilité. Une petite révolution pour les basketteurs, qui auront désormais la sensation de "voler" sur le terrain. D'ailleurs, son nom n'est autre qu'une référence à l'avion présidentiel américain qui porte le même nom.</p>
            </div>
            <div class="bas">
                <ul>
                    <li>prix: ~100-120€</li>
                    <li>modèle: all-white</li>
                    <li>marque: Nike</li>
                    <li>catégorie: lifestyle</li>
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