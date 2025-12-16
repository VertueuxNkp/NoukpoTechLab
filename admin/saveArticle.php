<?php
    include("../includes/connexion.php");

    $nomArticle = $_POST["nomArticle"];
    $description = $_POST["description"];
    $categorie = $_POST["categorie"];
    $prixUnitaire = $_POST["prixUnitaire"];
    $qteStock = $_POST["qteStock"];

    $dossierImage = "";

    if(isset($_FILES["image"]) AND $_FILES["image"]["error"] == 0){
        //echo("succes");

        //INFOS SUR LE FICHIER UPDLOADE
        $fichierTemp = $_FILES["image"]["tmp_name"];
        $nomImage = $_FILES["image"]["name"];

        $dossierImage = "../images/articles/".$categorie."/".$nomImage;

        //CHEMIN DE L'IMAGE A ENREGISTRE
        $cheminImage = "images/articles/".$categorie."/".$nomImage;
        //echo $cheminImage;

        if(move_uploaded_file($fichierTemp, $dossierImage)){
            $saveArticle = sprintf("INSERT INTO article VALUES(NULL, '%s', '%s', '%s', '%d', '%d', '%s')", $nomArticle, $description, $categorie, $prixUnitaire, $qteStock, $cheminImage);
			mysqli_query($bdd, $saveArticle);
            header("Location:saveArticleForm.php?save=oui");
        }else{
            header("Location:saveArticleForm.php?save=non");
        }
        
    }