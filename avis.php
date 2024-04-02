<?php
    date_default_timezone_set('Europe/Paris');  
    require 'PDO.php'; // on relie a la base de donnees
    session_start(); // on commence la session

    // si l'utilisateur de la session est connecte
    if(isset($_SESSION['user'])){
        //si ke bouton poster a bien ete appuye
        if(isset($_POST['poster'])){
            // si ces champs ne sont pas vide
            if(isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['select'])){
                
                //on acorde des variables aux donnees qu on a ecrite du formulaire
                $pseudo = htmlspecialchars($_SESSION['user']);
                $titre = htmlspecialchars($_POST['titre']);
                $contenu = htmlspecialchars($_POST['contenu']);
                $select = $_POST['select'];

                // On insert dans la table avis avec les valeurs remplies du formulaire
                $sql = $db->prepare("INSERT INTO avis(pseudo, chaussure, titre, contenu, date_publication) VALUE (?, ?, ?, ?, now())");
                $sql->execute(array($pseudo, $select, $titre, $contenu ));

                // on redirige vers la page d acceuil
                header('Location:Page_d_acceuil.php');
            }
        }
    }else{
        // s il n est pas connecte, on redirige vers connexion.php
        header('Location:Connexion.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="avis.css" >
    <title>Rédigez un avis</title>
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
        <form action="avis.php" method="post">
        <h1 class="title">Rédigez un avis</h1>
                <div>
                    <label>Pseudo</label> <br>
                    <input type="text"  name = "pseudo"placeholder=<?php echo $_SESSION['user']; ?> required readonly> <!-- on fait en sorte que le champ soit pre rempli avec le nom de l 'utilisateur de la session -->
                </div>
                <div>
                    <label> Chaussure </label> <br>
                    <select name="select">
                        <?php 
                        // on fait en sorte de montrer toutes les chaussures de la table sneakers 

                        // on selectionne toutes les chaussures
                        $req = $db->query("SELECT * FROM Sneakers ORDER BY id DESC");
                        // tant qu il y a des chaussures non vus
                        while($cherche = $req->fetch()){ 
                        ?>
                        <!-- On met dans une variable fonction le nom de chacune des paire de chaussures-->
                        <option> <?php echo $cherche['nom']; ?></option> 
                        <?php 
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Titre</label> <br>
                    <input type="text" name = "titre" placeholder= "Écrivez un titre" required>
                </div>
                <div>
                    <label>Contenu</label> <br>
                    <textarea name="contenu" placeholder = "Écrivez votre contenu" required ></textarea >
                </div>
                <div class="button" >
                    <input type="submit" name="poster" value="Poster" >
                </div>
        </form>
    </section>

</body>
</html>