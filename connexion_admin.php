<?php
    require_once 'PDO.php'; // On relie a la base de donnee
    session_start(); // on demarre la session
    if(isset($_POST['mail']) && isset($_POST['pseudo']) && isset($_POST['mdp'])){   //On regarde si ca a bien  ete remplis
        
        $mail = htmlspecialchars($_POST['mail']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = htmlspecialchars($_POST['mdp']);

        $check = $db->prepare("SELECT mail, pseudo, tel, genre, mdp, admin FROM Users WHERE mail = ?"); // on cherche dans la table Users
        $check->execute(array($mail));
        $data = $check->fetch(); //on met dans une variable la recherche des champs
        $row = $check->rowCount(); // On regare si il existe un utilisateur correspondant

        if($row == 1){ // si il existe un utlisateur

            if($data['admin'] == 1){ // on regarde si il est admin
                if($data['mail'] === $mail){ // on regarde si le mail correspond a celui de la base de donnee
                    if($data['pseudo'] === $pseudo){ // on regarde si le pseudo correspond a celui de la base de donneee
                        $checkmdp = password_verify($mdp, $data['mdp']);
                        if($checkmdp == true){  // on regarde si le mot de passe correspond a celui de la base de donnee
                            $_SESSION['pseudo'] = $pseudo; // on met comme pseudo de la session le pseudo
                            $_SESSION['mail'] = $mail;//on met comme pseudo de la session le pseudo
                            $_SESSION['mdp'] = $mdp;//on met comme pseudo de la session le pseudo
                            header('Location:fonction_admin.php'); // on rediriges sur la page admin
                        }else{echo "Le mot de passe est incorrect";}
                    }else{echo "Votre pseudo est incorrect";}
                }else{echo "Votre mail est incorrect";}
            }else{echo "Vous n'êtes pas admin, je vous recommande de vous connecter " ?>  <a href="Connexion.php"> ici</a> <?php ".";}
        }else{echo "Cet utilisateur n'est pas présent dans notre base de données";?>
            <br> <a href="Inscription.php"> Veuillez vous inscrire ici</a> <?php
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
<title>Connexion</title>
<meta charset="utf-8">
</head>

<body>
    <form  method="POST" action="connexion_admin.php">
        E-mail : <input type="mail" name="mail" placeholder="Entrez votre E-mail" required>   
        <br>
        Pseudo : <input type="text" name="pseudo" placeholder="Entrez votre pseudo" required>
        <br>
        Mot de passe :<input type="password" name="mdp" placeholder="Entrez votre mot de passe" required>
        <br>
        <input type="submit" name="envoyer">
    </form>


</body>
</html>
