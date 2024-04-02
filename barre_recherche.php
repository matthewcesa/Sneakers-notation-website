<?php 

    require 'PDO.php';
    $allusers = $db->query('SELECT * FROM Sneakers '); // on selectione toutes les utilisateurs de la table
    if(isset($_GET['search']) && !empty($_GET['search'])){ 
        if(isset($_GET['rechercher']) && !empty($_GET['rechercher']))
        $recherche = htmlspecialchars($_GET['search']);
        //on regarde si la variable recherche correspond a queqlue chose d'un des champs de la table
        $allusers = $db->query('SELECT nom FROM Sneakers WHERE nom LIKE "%'.$recherche.'%"  OR couleur LIKE "%'.$recherche.'%" OR couleur2 LIKE "%'.$recherche.'%" OR marque LIKE "%'.$recherche.'%" OR categorie LIKE "%'.$recherche.'%" ');
    }
    // fonction qui retires les espaces ou plutot qui remplace les espaces par ''
    function transform($string){
        echo str_replace(' ', '', $string);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="barre_recherche.css" >
    <title>search</title>
</head>
<body>
    <form method="get" class="formulaire">
        <input type="search" name="search" placeholder="rechercher..">
        <input type="submit" name = "rechercher">
    </form>
    <section class="affiche-resultat">
        <?php
            if($allusers->rowCount() > 0){ //si on a trouve au moins 1 resultat
                while($user = $allusers->fetch()){ //tant qu'on a pas trouvé tous les résultats
                    ?> <a href=<?php echo transform($user['nom'].".php");?>> <?php echo $user['nom']?></a><?php // on affiche le(s)résultat(s) trouve(s)
                }
            }else{
                ?>
                <p> Résultat introuvable </p> <!-- si on ne trouve pas de résultats on l affiche-->
                <?php
            }
        
        ?>

    </section>
</body>
</html>


