<?php
    
    session_start(); //On lance la session
    require_once 'PDO.php'; // On inclu la connexion à la bdd
    
    // Si les variables existent et qu elles ne sont pas vides
    if(!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['tel']) && !empty($_POST['genre']) && !empty($_POST['mdp']) && !empty($_POST['confirm']))
    {
        // On met les variables récupérés dans de nouvelle variables
        $mail = htmlspecialchars($_POST['mail']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $tel = htmlspecialchars($_POST['tel']);
        $genre = htmlspecialchars($_POST['genre']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $confirm = htmlspecialchars($_POST['confirm']);
        
        // On vérifie si l'utilisateur existe
        $check = $db->prepare('SELECT mail, pseudo, tel, genre, mdp, admin FROM Users WHERE mail = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        $mail = strtolower($mail); // on transforme toute les lettres majuscule en minuscule 
        
        // Si c est egal a 0 alors l utilisateur n existe pas
        if($row == 0){ 
            if(strlen($mail) <= 100){ // On verifie que la longueur du pseudo a un nombre de caracteres inferieusrs ou egal a 100
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)){ // Si l'email est conforme 

                    $good = $db->prepare("SELECT * FROM Users WHERE pseudo = ?");
                    $good->execute(array($pseudo));
                    $don = $good->fetch();
                    $ra = $good->rowCount();
                    
                    if($ra == 0){
                        if(strlen($pseudo) <= 100){ // On verifie que la longueur du mail <= 100

                            // on selectionne dans la table user les personnes qui ont un num etant egal a lavariable $tel
                            $sql = $db->prepare("SELECT * FROM Users WHERE tel = ?");
                            $sql->execute(array($tel));
                            $donnee = $sql->fetch();
                            $rang = $sql->rowCount();
                            // si personne a ce numero dans la base de donnnees
                            if($rang == 0){
                                if(substr($tel,0,1) == 0){ // On verifie si le numero de telephone commence par un 0
                                    if($mdp == $confirm){ // si les deux mdp saisis sont bon
                                    
                                    $mdp = password_hash($mdp, PASSWORD_DEFAULT); // On hash le mdp cad quon l encrypte pour faire en sorte que personne ne peut le voir tel qu il est
                                    
                                    // On insère dans la base de données
                                    $query = "INSERT INTO Users(mail,pseudo, tel, genre, mdp)  VALUES ('$mail','$pseudo','$tel','$genre','$mdp')";
                                    $req = $db->prepare($query);
                                    $req->execute();
                                    $_SESSION['user'] = $pseudo; // on met la valeur pseudo en tant que user de la session pour pourvoir l'utiliser dans d'autre(s) page(s)
                                    $_SESSION['mail'] = $mail;
                                    $_SESSION['tel'] = $tel;
                                    $_SESSION['genre'] = $genre;
                                    $_SESSION['mdp'] = $mdp;
                                    header('Location:Landing.php'); // on redirige vers Landing.php cad notre page de profil
                                    }
                                    else {echo "Les deux mots de passe sont incompatibles";}
                                }else{echo "numéro de téléphone non valide";}
                            }else{ echo "Votre numéro de téléphone est déjà présente dans notre base de données, veuillez en mettre un autre";}
                        }else{echo "Pseudo trop long";}
                    }else{ echo "Cet pseudo est existe déjà";}
                }else{echo "Email non valide";}
            }else{echo "Email trop long";}
        }else{ echo "Ce compte est déjà présent dans notre base de données";
            ?> <br><a href="Connexion.php">Veuillez vous connecter ici</a><?php
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Inscription.css">
    <title>Formulaire d'inscription</title>
</head>
<body>
<section class="top-page">
        <header class="header">
            <div id="leftbox">
                <h1><a class="titre" href="Page_d_acceuil.php">SneakerAdvisor</a>  </h1>
            </div>
            <div id="rightbox">
                <button onclick="window.location.href='Connexion.php';" class = "button"> Connexion</button>
                <button onclick="window.location.href='Inscription.php';" class="button">Inscription</button>
                <button onclick="window.location.href='Landing.php';" class = "button"> Votre espace</button>
            </div>
        </header>
    </section>
       
        <form action ='Inscription.php' method="post" class="formulaire">
            <h1 class="title">Inscription</h1>
            <h4>Veuillez renseignez vos informations</h4>
                <div>
                    <label> Adresse Mail</label>
                    <input type="email"  name="mail" placeholder="Votre email" required>
                </div>
                <div>
                    <label>Pseudo</label>
                    <input type="text"  name="pseudo"placeholder="Votre pseudo" required>
                </div>
                <div>
                    <label>Numéro de téléphone</label>
                    <input type="tel"  name = "tel"placeholder="Votre numéro de téléphone" required minlength="0" maxlength="10" >
                </div>
                <div>
                    Genre : 
                    <br>
                    <input type="radio" name="genre" value ="Homme"> Homme
                    <br>
                    <input type="radio" name="genre" value = "Femme">Femme
                    <br>
                    <input type="radio" name="genre" value="Ne préfère pas répondre">Ne préfère pas répondre
                </div>
                <div>
                    <label> Mot de passe</label>
                    <input type="password"  name ="mdp" placeholder="Votre mot de passe" required>
                </div>
                <div>
                    <label> Confirmez votre mot de passe</label>
                    <input type="password"  name ="confirm" placeholder="Votre mot de passe" required>
                </div>
                <div class="button">

                    <input type="submit" name ="submit" >
                </div>
        </form>
    </section>
</body>
</html>

