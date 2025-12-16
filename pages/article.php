<?php
    include("includes/selectionArticle.php");
?>

<ul class="nav justify-content-center mb-3">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php?page=articles&articles=ordinateur">Ordinateurs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=articles&articles=imprimante">Imprimantes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=articles&articles=telephone">Téléphones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php?page=articles&articles=accessoire">Accessoires</a>
  </li>
</ul>
<div class="container presentationArticle">
<?php
    if(isset($_GET["articles"])){
        $page = $_GET["articles"];
        switch ($page){
            case "ordinateur":
                $listeArticle = $listeOrdinateur;
                break;
            case "imprimante":
                $listeArticle = $listeImprimante;
                break;
            case "telephone":
                $listeArticle = $listeTelephone;
                break;
            case "accessoire":
                $listeArticle = $listeAccessoire;
                break;
            default:
                $listeArticle = $listeOrdinateur;
        }
    }else{
        $listeArticle = $listeOrdinateur;
    }
    //var_dump($listeArticle);

    $nbrLigne = ceil(mysqli_num_rows($listeArticle)/3);
    //echo $nbrLigne;

    for($x = 1; $x <= $nbrLigne; $x++){
        
?>
        <div class="row" style="width: 100%;">
            <?php
                for($i = 1; $i<=3; $i++){
                    $article = mysqli_fetch_assoc($listeArticle);
                    //var_dump($article);
            ?>
            <div class="col-md-4">
                <div class="card">
                    <img src=<?php echo($article["urlimage"]) ?> class="card-img-top" height="250px" style="border-bottom: 1px solid black;" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo($article["nomComplet"]) ?></h5>
                        <p class="card-text"><?php echo($article["description"]) ?></p>
                        <a id="add" class="btn btn-primary" data-id="<?php echo $article['idArticle']; ?>">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
</div>

<?php
        
    }
?>
<!-- Bouton de retour en haut -->
