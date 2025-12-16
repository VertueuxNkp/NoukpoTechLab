<?php
    include("connexion.php");

    $ordinateurRequete = sprintf("SELECT * FROM article WHERE categorie = 'ordinateurs'");
    $imprimanteRequete = sprintf("SELECT * FROM article WHERE categorie = 'imprimantes'");
    $telephoneRequete = sprintf("SELECT * FROM article WHERE categorie = 'telephones'");
    $accessoireRequete = sprintf("SELECT * FROM article WHERE categorie = 'accessoires'");

    $listeOrdinateur = mysqli_query($bdd, $ordinateurRequete);
    $listeImprimante = mysqli_query($bdd, $imprimanteRequete);
    $listeTelephone = mysqli_query($bdd, $telephoneRequete);
    $listeAccessoire = mysqli_query($bdd, $accessoireRequete);

    //var_dump($listeOrdinateur);