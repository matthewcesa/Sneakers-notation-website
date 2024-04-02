<?php
    session_start(); //on demarre la session
    require_once "PDO.php"; //connexion avec la base de donnees
    // Si les variables existent et qu elles ne sont pas vides
    if(!empty($_POST['mail']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        //On mets les valeus du formulaire dans des variables qu on reutiliseras plus tard dans le codec
        $mail = htmlspecialchars($_POST['mail']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['mdp']);

        // on se prepare a chercher lutilisateur dans notre base de donnees
        $check = $db->prepare("SELECT mail, pseudo, tel, genre, mdp, admin FROM Users WHERE mail = ?");
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1){ // Si c est egal a 1 alors l utilisateur est present dans notre base de donnees

            if($data['mail'] === $mail){ // si la variable mail est egal a la variable mail de la base de donnees
                if($data['pseudo'] === $pseudo){ //si la variable pseudo est egal a la variable pseudo de la base de donnees
                    $checkmdp = password_verify($mdp, $data['mdp']);
                    if($checkmdp == true){ //si la variable mdp est egal a la variable mdp de la base de donnees
                        $_SESSION['user'] = $data['pseudo']; // on accorde la valeur pseudo de la base de donnees a celle de la session
                        $_SESSION['mail'] = $data['mail']; // on met la valeur mail de la base de donnee en tatn que variable general de la session
                        $_SESSION['tel'] = "0".$data['tel'];
                        $_SESSION['genre'] = $data['genre'];
                        $_SESSION['mdp'] = $data['mdp'];
                        
                        header('Location:Landing.php'); // On redirige vers la page profil
                    }else{echo "Mot de passe incorrect, veuillez réessayer";}
                }else{echo "Pseudo introuvable, veuillez réessayer";}
            }else{echo"Mail introuvable, veuillez réessayer";}
        }else{echo "Cet utilisateur n'est pas présent dans notre base de données";?>
            <br> <a href="Inscription.php"> Veuillez vous inscrire ici</a> <?php // sinon on met une reference vers connexion.php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Connexion.css">
    <title>Formulaire de connexion</title>
</head>
<body>
    <section class="top-page">
        <header class="header">
            <div id="leftbox">
            <h1><a href="Page_d_acceuil.php"class="titre">SneakerAdvisor</a>  </h1>
                <nav>
                    <a href="avis.php" class="titre">Rédigez un avis</a>
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

        <form action="Connexion.php" method = "POST" class="formulaire">
            <h1 class="title">Veuillez vous connecter</h1>
                <div>
                    <label> Adresse Mail</label>
                    <input type="email"  name = "mail"placeholder="Votre email" required>
                </div>
                <div>
                    <label >Pseudo </label>
                    <input type="text" name = "pseudo" placeholder= "votre pseudo" required>
                </div>
                <div>
                    <label> Mot de passe</label>
                    <input type="password"  name="mdp" placeholder="Votre mot de passe" required>
                </div>
                <div class="button" >
                    <input type="submit" value="Continuer" >
                </div>
                <a href="connexion_admin.php"> Espace admin </a>
        </form>
        
</body>
</html>
