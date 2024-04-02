<?php
    require 'PDO.php'; // On relie a la base de donnnees
    session_start(); // on commence la session

    // si on a appuye sur le bouton ajouter
    if(isset($_POST['ajouter'])){
        //si les variables sont remplis 
        if(isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['couleur']) && !empty($_POST['couleur']) && isset($_POST['marque']) && !empty($_POST['marque']) && isset($_POST['categorie']) && !empty($_POST['categorie'])){
           // on cherche dans la table Sneakers en selectionnant toutes les chaussures
            $sql = $db->query("SELECT * FROM Sneakers");
            
            $row = $sql->rowCount();

            //si la paire de chaussure n existe pas
            if($row == 0){

            
            //on accorde des variables aux donnes ecrites dans le formulaire
            $nom = htmlspecialchars($_POST['nom']);
            $couleur = htmlspecialchars($_POST['couleur']);
            $couleur2 = htmlspecialchars($_POST['couleur2']);
            $marque = htmlspecialchars($_POST['marque']);
            $categorie = htmlspecialchars($_POST['categorie']);;
            
            //on ajoute dans la base de donnees
            $sql = $db->prepare("INSERT INTO Sneakers(nom, couleur, couleur2, marque, categorie) VALUES ('$nom','$couleur','$couleur2','$marque','$categorie')");
            $sql->execute();
            // si elle a bien ete ajoute on envoie un message de confirmation
            echo "La paire a bien été ajouté à la base de données";
            }else{echo "la paire de chaussure est deja presente dans notre base de donnees";}
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout</title>
</head>
<body>
    <div>   
        <button onclick="window.location.href='fonction_admin.php';" class = "button"> précédent</button></div>
    <div>

    <form action="ajout_sneakers.php" method="post">
        <h2>Ajout une paire de chaussures</h2>
        <div>
            <label> Nom:</label>
            <input type="text" name="nom" placeholder="nom de la paire" required>
        </div>
        <div>
            <label> Couleur primaire:</label>
            <input type="text" name="couleur" placeholder="couleur primaire" required>
        </div>
        <div>
            <label> Couleur secondaire:</label>
            <input type="text" name="couleur2" placeholder="couleur secondaire" >
        </div>
        <div>
            <label> Marque:</label>
            <input type="text" name="marque" placeholder="Nom de la marque" required>
        </div>
        <div>
            <label> Catégorie:</label>
            <input type="text" name="categorie" placeholder="catégorie" required>
        </div>
        <div class="button" >
                <input type="submit" name ="ajouter" value="ajouter" >
        </div>
    </form>
</body>
</html>