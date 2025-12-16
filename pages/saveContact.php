<?php
include("../includes/connexion.php");
    //var_dump($_POST);
    $nom = htmlspecialchars($_POST["nom"]);
    $mail = htmlspecialchars($_POST["mail"]);
    $numero = $_POST["numero"];
    $texte = htmlspecialchars($_POST["texte"]);

    //echo $nom." ".$mail." ".$texte;

    $saveContact = sprintf("INSERT INTO contact VALUES(NULL, '%s', '%d', '%s', '%s')", $nom, $numero, $mail, $texte);
    if(mysqli_query($bdd, $saveContact)){
        header("Location:../index.php?page=contact&save=oui");
    }else{
        header("Location:../index.php?page=contact&save=non");
    }
