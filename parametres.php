<?php
session_start();
require 'PDO.php'; // on relie a notre base de donnees

// on verifie qu ils existent
if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['tel']) && !empty($_POST['genre']) && !empty($_POST['mdp']))
{
    // On met les variables récupérés dans de nouvelle variables
    
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $tel = htmlspecialchars($_POST['tel']);
    $genre = htmlspecialchars($_POST['genre']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $nvmdp = htmlspecialchars($_POST['nvmdp']);
    $confirm = htmlspecialchars($_POST['confirm']);

    
    $check = $db->prepare("SELECT * From Users WHERE mail=?");
    $check->execute(array($mail));
    $data = $check->fetch();

    $verifmdp = password_verify($mdp, $data['mdp']);

    if($verifmdp == true){ //on verfiei si les mot de passe actuel est bon
        if(strlen($mail) <= 100){ // On verifie que la longueur du pseudo a un nombre de caracteres inferieusrs ou egal a 100
            $mail = strtolower($mail); // on transforme toute les lettres majuscule en minuscule
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){ // Si l'email est conforme 
                if(strlen($pseudo) <= 100){ // On verifie que la longueur du mail <= 100
                    if(substr($tel,0,1) == 0){ // On verifie si le numero de telephone commence par un 0
                        if($nvmdp == $confirm){ // si les deux nouveaux mdp saisis sont bon
                        
                        $nvmdp = password_hash($nvmdp, PASSWORD_DEFAULT); // On hash le nouveau  mdp cad quon l encrypte pour faire en sorte que personne ne peut le voir tel qu il est
                        
                        // ici on va changer le pseudo que ce soit dans la table Users ou avis, on fait comme si on connectait les deux tables par le champ pseudo
                        $verif = $db->query("SELECT * FROM avis");
                        //tant quil y a des avis
                        while($regarde = $verif->fetch()){
                            //si le pseudo actuel est egal au pseudo de l utilisateur de la session
                            if($regarde['pseudo'] == $_SESSION['user']){
                                // on change tous les avis ou le pseudo est egal au pseudo actuel par le nouveau pseudo
                                $bon = $db->prepare("UPDATE avis SET pseudo = '$pseudo' WHERE pseudo=?");
                                $bon->execute(array($regarde['pseudo']));
                            }
                        }
                        // On insère dans la base de données
                        // on update tous les attributs de la table Users par les varibales ecrites plus tot
                        $query = "UPDATE Users SET mail = '$mail', pseudo = '$pseudo', tel = '$tel', genre = '$genre', mdp = '$nvmdp' WHERE mail =?";
                        $req = $db->prepare($query);
                        $req->execute(array($mail));
                        $_SESSION['user'] = $pseudo; // on met la valeur pseudo en tant que user de la session pour pourvoir l'utiliser dans d'autre(s) page(s)
                        $_SESSION['mail'] = $mail;
                        $_SESSION['tel'] = $tel;
                        $_SESSION['genre'] = $genre;
                        $_SESSION['mdp'] = $nvmdp;

                        header('Location:Landing.php'); // on redirige vers Landing.php cad notre page de profil
                        }
                        else {echo "Vos deux nouveaux mots de passe sont incompatibles";}

                    }else{echo "numéro de télèphone non valide";}
                
                }else{echo "Pseudo trop long";}
                    
            }else{echo "Email non valide";}
                
        }else{echo "Email trop long";}
            
    }else{echo "Votre mot de passe actuel est incorrect";}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="para.css">
    <title>Paramètres</title>
</head>
<body>
<section class="top-page">
        <header class="header">
            <div id="leftbox">
                <button onclick="window.location.href='Landing.php';" class = "button"> précédent</button>
                <h1 class="titre" id="titre"><a class="title" href="Page_d_acceuil.php">SneakerAdvisor</a></h1> 
            </div>
        </header>
</section>
<section>
    <form action="parametres.php" method="post">
    <h1 class="title">Inscription</h1>
        <h4>Veuillez renseignez vos informations</h4>
        <!-- On va mettre des valeurs par defaut pour chaucune des variables a part pour les mots de passes pour que l utilisateur puisse ecrire le mot de passe-->
            <div>
                <label> Adresse Mail</label>
                <input type="email"  name="mail" placeholder="Votre email" value=<?php echo $_SESSION['mail'];?> required readonly> <!-- on a une valeur par defaut qu on ne peut que lire donc pas changer --> 
                (votre mail est ne peut pas être changé)
            </div>
            <div>
                <label>Pseudo</label>
                <input type="text"  name="pseudo" placeholder="Votre pseudo" value=<?php echo $_SESSION['user'];?> required>
            </div>
                <div>
                    <label>Numéro de téléphone</label>
                    <input type="text"  name ="tel" placeholder="Votre numéro de téléphone" value=<?php echo $_SESSION['tel'];?> required minlength="0" maxlength="10" >
                </div>
                <div>
                    Genre : 
                    <?php 
                    if($_SESSION['genre'] == "Homme"){
                    ?>
                    <input type="radio" name="genre" value ="Homme" checked> Homme
                    <input type="radio" name="genre" value = "Femme">Femme
                    <input type="radio" name="genre" value="Ne préfère pas répondre">Ne préfère pas répondre<?php
                    }
                    else if($_SESSION['genre'] == "Femme"){
                    ?>
                    <input type="radio" name="genre" value ="Homme" > Homme
                    <input type="radio" name="genre" value = "Femme" checked>Femme
                    <input type="radio" name="genre" value="Ne préfère pas répondre">Ne préfère pas répondre
                    <?php 
                    }else if($_SESSION['genre'] == "Ne préfère pas répondre"){
                    ?>
                    <input type="radio" name="genre" value ="Homme" > Homme
                    <input type="radio" name="genre" value = "Femme">Femme
                    <input type="radio" name="genre" value="Ne préfère pas répondre" checked>Ne préfère pas répondre <?php
                    }
                    ?>
                </div>
                <div>
                    <label> Mot de passe actuel</label>
                    <input type="password"  name ="mdp" placeholder="Votre mot de passe"  required>
                    (Veuillez entrez votre mot de passe actuel)
                </div>
                <div>
                    <label> Nouveau mot de passe</label>
                    <input type="password"  name ="nvmdp" placeholder="Votre nouveau mot de passe" required>
                    (Si vous ne voulez pas changer de mot de passe, veuillez entrez votre mot de passe actuel)
                </div>
                
                <div>
                    <label> Confirmez votre nouveau mot de passe</label>
                    <input type="password"  name ="confirm" placeholder="Confirmez votre nouveau mot de passe" required>
                    (Si vous ne voulez pas changer de mot de passe, veuillez entrez votre mot de passe actuel)
                </div>
                <div class="button">
                    <input type="submit" name ="submit" >
                </div>
    </form>
</section>
</body>
</html>