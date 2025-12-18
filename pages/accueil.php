<?php 
    include("includes/selectionArticle.php");
    function e($string) {
        return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
    }
?>


<div id="accueilImage">
    <h3>Bienvenue chez NoukpoTechLab</h3>
    <span>La maison du matériels informatiques</span>
</div>

<div class="container presentationArticle">
    <div class="row">
        <div class="row" style="width: 100%;">
            <?php
                for($i = 1; $i<=3; $i++){
                    $ordinateur = mysqli_fetch_assoc($listeOrdinateur);
                    //var_dump($ordinateur);
            ?>
            <div class="col-md-4">
                <div class="card">
                <img src=<?php echo($ordinateur["urlimage"]) ?> class="card-img-top" height="250px" style="border-bottom: 1px solid black;" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo($ordinateur["nomComplet"]) ?></h5>
                    <p class="card-text"><?php echo($ordinateur["description"]) ?></p>
                    <button class="btn btn-primary w-100 ajouter-panier"
                                                data-id="<?= (int)$ordinateur['idArticle'] ?>"
                                                data-nom="<?= e($ordinateur['nomComplet']) ?>"
                                                data-image="<?= e($ordinateur['urlimage']) ?>"
                                                data-prix="<?= isset($ordinateur['prixUnitaire']) ? floatval($ordinateur['prixUnitaire']) : 0 ?>">
                                            <i class="fas fa-cart-plus me-2"></i>
                                            Ajouter au panier
                    </button>
                </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="row lienArticle">
            <div class="col">
                <a href="index.php?page=articles&categorie=ordinateur" class="btn-primary">Voir Plus</a>
            </div>
        </div>
    </div>
</div>

<div class="container presentationArticle">
    <div class="row">
        <div class="row" style="width: 100%;">
            <?php
                for($i = 1; $i<=3; $i++){
                    $imprimante = mysqli_fetch_assoc($listeImprimante);
                    //var_dump($imprimante);
            ?>
            <div class="col-md-4">
                <div class="card">
                <img src=<?php echo($imprimante["urlimage"]) ?> class="card-img-top" height="250px" style="border-bottom: 1px solid black;" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo($imprimante["nomComplet"]) ?></h5>
                    <p class="card-text"><?php echo($imprimante["description"]) ?></p>
                    <button class="btn btn-primary w-100 ajouter-panier"
                                                data-id="<?= (int)$imprimante['idArticle'] ?>"
                                                data-nom="<?= e($imprimante['nomComplet']) ?>"
                                                data-image="<?= e($imprimante['urlimage']) ?>"
                                                data-prix="<?= isset($imprimante['prixUnitaire']) ? floatval($imprimante['prixUnitaire']) : 0 ?>">
                                            <i class="fas fa-cart-plus me-2"></i>
                                            Ajouter au panier
                    </button>
                </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="row lienArticle">
            <div class="col">
                <a href="index.php?page=articles&categorie=imprimante" class="btn-primary">Voir Plus</a>
            </div>
        </div>
    </div>
</div>

