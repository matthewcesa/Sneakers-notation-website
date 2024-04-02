<?php // acces dans la base de donne
    $user = 'root';
    $mdp = '';
    try{
        // on connecte a la base de donnnes
        $db = new PDO('mysql:host=localhost;dbname=Projets_IO2', $user,$mdp);
    }
    catch(PDOException $e){
        print"Erreur :" . $e->getMessage() . "<br>"; // $e qui va contenur notre erreur
        die; // on arrête le programme
    }

?>