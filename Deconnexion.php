<?php
    session_start(); // on se connecte a la session
     session_destroy(); // destruction de la session
     header('Location: Page_d_acceuil.php'); // redirection vers la page dacceuil
?>