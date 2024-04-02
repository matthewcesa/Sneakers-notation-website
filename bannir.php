<?php
    require 'PDO.php'; // connexion a la base de donnees

    //on selectionne tous les utilisateurs dans la table Users
    $user = $db->query('SELECT * FROM Users ORDER BY ID'); 

    if(isset($_GET['supprimer']) && !empty($_GET['supprimer'])){ // si on a appuye sur supprime et que ce n est pas vide
        // on accorde une variable pour la donnees
        $suppr = $_GET['supprimer'];

        $sql = $db->prepare("DELETE FROM Users WHERE ID = ?");
        $sql->execute(array($suppr)); // on efface l'utilisateur de la base de donnees

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bannir User</title>
</head>
<body>
    <div>
    <button onclick="window.location.href='fonction_admin.php';" class = "button"> précédent</button></div>
    <div>
    <?php
        // tant qu il ya des utilisatueurs
        while($alluser = $user->fetch()){?>
        <!-- on affiche les ID et les noms des utilisateurs avec une reference vers bannir.php-->
            <li><?php echo $alluser['ID'];?>: <?php echo $alluser['pseudo'];?> - <a href="bannir.php?supprimer=<?php echo $alluser['ID'];?>">bannir</a> </li>
       <?php
        }   
    ?>
    </div>
<ul></ul>
</body>
</html>