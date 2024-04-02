<?php 
    session_start();
    $_SESSION['chaussure'] = "New balance 550";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sneakers.css" >
    <title>New balance 550</title>
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
    <h1 class="titre"> New balance 550</h1>
    <section class="contenu">

        <div class="gauche">
            <img src="https://www.sneakers-actus.fr/wp-content/uploads/2021/08/NB-550-BB550WT1-White-Green-Boston-Celtics-on-feet-couv.jpg" class="img">
        </div>

        <div class="droite">
            <h2 class="titre"> New balance 550 « WHITE GREEN »</h2>
            <div>
                <p> La silhouette b-ball rétro de l’équipementier bostonien va faire son retour cet été avec une New Balance 550 « White/Green ».En plus d’une version « White/Purple« , New Balance nous distillera ces prochains jours une New Balance 550 « White Green ». Comme sa consoeur elle viendra dans une tige en cuir lisse et perforé, dont la base blanche est ici rehaussée d’empiècements et brandings verts. On retrouve les deux teintes couplées sur les soles, tandis qu’un mudguard suédé gris parachève le design épuré.Cette nouvelle New Balance 550 « White/Green » sortira le 24 juin  chez certains détaillants.</p>
            </div>
            <div>
                <p>Introduite pour le basketball en 1989, la 550 de New Balance a signé son grand retour en 2020 à l'annonce de la collaboration entre la firme de Boston et Aimé Leon Dore. Et pour continuer sur cette belle lancée, NB continu de décliner le modèle dans un vaste choix de coloris !

La New Balance 550 White Green présente une combinaison d'empiècements blancs et verts, rappelant les sneakers rétro des années 80. Du côté des matériaux, du cuir lisse, du suède et du cuir perforé composent les éléments de cette low-top en lui apportant un aspect premium.</p>
            </div>
            <div class="bas">
                <ul>
                    <li>prix: ~100-150€</li>
                    <li>modèle: Blanc/vert</li>
                    <li>marque: New balance</li>
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