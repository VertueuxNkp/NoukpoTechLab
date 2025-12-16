<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
        if(isset($_GET["page"])){
            $page = $_GET["page"];
            switch ($page){
                case "index":
                    echo "<title>Accueil</title>";
                    break;
                case "articles":
                    echo "<title>Articles</title>";
                    break;
                case "contact":
                    echo "<title>Contact</title>";
                    break;
                default:
                    echo "<title>Accueil</title>";
            }
        }else{
            echo "<title>Accueil</title>";
        }
    ?>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/accueil.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">-->
</head>
<body>
    
    <header>
        <?php
            include("includes/header.php");
        ?>
    </header>

    <main>
        <?php
            include("includes/page.php");
        ?>

        <button id="add" class="add-to-panier" aria-label="Retour en haut">
            P
        </button>

        <button id="backToTop" class="back-to-top-btn" aria-label="Retour en haut">
            ↑
        </button>

        <style>
        .back-to-top-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-to-top-btn.show {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .add-to-panier {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border: none;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-to-panier.show {
            opacity: 1;
            visibility: visible;
        }

        .add-to-panier:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        </style>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.getElementById('backToTop');
            const backToToAdd = document.getElementById('add');
            console.log(backToToAdd)
            
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopBtn.classList.add('show');
                    backToToAdd.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                    backToToAdd.classList.remove('show');
                }
            });
            
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        </script>
    </main>

    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <?php
        if(isset($_GET["page"])){
            if($_GET["page"] == "contact"){
            ?>
            <script src="js/contact.js"></script>
            <?php

            }else if($_GET["page"] == "articles" || $_GET["page"] == "index"){
            ?>
            <script src="js/article.js"></script>
            <?php
            }
        }
    ?>
</body>
</html>