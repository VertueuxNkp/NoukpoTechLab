<?php
    if(isset($_GET["page"])){
        $page = $_GET["page"];
        switch ($page){
            case "index":
                include "pages/accueil.php";
                break;
            case "articles":
                include "pages/article.php";
                break;
            case "contact":
                include "pages/contact.php";
                break;
            default:
                include "pages/accueil.php";
        }
    }else{
        include "pages/accueil.php";
    }
