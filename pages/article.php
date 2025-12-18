<?php
// ============================================
// pages/articles.php - VERSION SÉCURISÉE
// ============================================

// Fonction helper pour échapper (protection XSS)
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

// Inclure les fichiers nécessaires
include("includes/connexion.php"); // Pour la fonction escape() si elle existe
include("includes/selectionArticle.php");

// ============================================
// 1. NAVIGATION DYNAMIQUE ET SÉCURISÉE
// ============================================

// Liste blanche des catégories autorisées
$categories_autorisees = ['ordinateurs', 'imprimantes', 'telephones', 'accessoires'];

// Récupérer et valider la catégorie
$categorie = $_GET['articles'] ?? 'ordinateurs';
if (!in_array($categorie, $categories_autorisees)) {
    $categorie = 'ordinateurs'; // Valeur par défaut sécurisée
}

// Navigation dynamique avec "active" automatique
?>
<ul class="nav justify-content-center mb-3">
    <?php foreach ($categories_autorisees as $cat): ?>
        <li class="nav-item">
            <a class="nav-link <?= ($categorie === $cat) ? 'active' : '' ?>" 
               href="index.php?page=articles&articles=<?= e($cat) ?>">
               <?= ucfirst(e($cat)) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
// ============================================
// 2. SÉLECTION DES ARTICLES (SÉCURISÉE)
// ============================================

// Déterminer quelle liste utiliser
switch ($categorie) {
    case 'ordinateurs':
        $listeArticle = $listeOrdinateur;
        break;
    case 'imprimantes':
        $listeArticle = $listeImprimante;
        break;
    case 'telephones':
        $listeArticle = $listeTelephone;
        break;
    case 'accessoires':
        $listeArticle = $listeAccessoire;
        break;
    default:
        $listeArticle = $listeOrdinateur;
}

// ============================================
// 3. AFFICHAGE DES ARTICLES (3 PAR LIGNE)
// ============================================
?>

<div class="container presentationArticle">
    <?php
    // Vérifier s'il y a des articles
    //var_dump(($listeArticle));
    if (mysqli_num_rows($listeArticle) === 0):
    ?>
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>
            Aucun article disponible dans cette catégorie pour le moment.
        </div>
    <?php else: ?>
        <?php
        // Calculer le nombre de lignes nécessaires
        $nombreArticles = mysqli_num_rows($listeArticle);
        $nbrLigne = ceil($nombreArticles / 3);
        
        // Réinitialiser le pointeur de résultat (important !)
        mysqli_data_seek($listeArticle, 0);
        
        // Boucle pour chaque ligne
        for ($ligne = 0; $ligne < $nbrLigne; $ligne++):
        ?>
            <div class="row mb-4">
                <?php
                // Afficher 3 articles maximum par ligne
                for ($col = 0; $col < 3; $col++):
                    $article = mysqli_fetch_assoc($listeArticle);
                    
                    // Si l'article existe
                    if ($article):
                ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <!-- Image avec fallback si problème -->
                                <img src="<?= e($article['urlimage']) ?>" 
                                     class="card-img-top" 
                                     height="250" 
                                     style="object-fit: cover; border-bottom: 1px solid #dee2e6;" 
                                     alt="<?= e($article['nomComplet']) ?>"
                                     onerror="this.src='images/default-product.jpg'; this.alt='Image non disponible'">
                                
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-primary"><?= e($article['nomComplet']) ?></h5>
                                    
                                    <div class="card-text flex-grow-1 mb-3">
                                        <?= e($article['description']) ?>
                                    </div>
                                    
                                    <div class="mt-auto">
                                        <!-- Prix (si vous avez une colonne 'prix' dans votre table) -->
                                        <?php if (isset($article['prixUnitaire']) && !empty($article['prixUnitaire'])): ?>
                                            <div class="h4 text-success mb-3">
                                                <?= number_format(floatval($article['prixUnitaire']), 2, ',', ' ') ?> €
                                            </div>
                                        <?php endif; ?>
                                        
                                        <!-- Bouton Ajouter au panier -->
                                        <button class="btn btn-primary w-100 ajouter-panier"
                                                data-id="<?= (int)$article['idArticle'] ?>"
                                                data-nom="<?= e($article['nomComplet']) ?>"
                                                data-image="<?= e($article['urlimage']) ?>"
                                                data-prix="<?= isset($article['prixUnitaire']) ? floatval($article['prixUnitaire']) : 0 ?>">
                                            <i class="fas fa-cart-plus me-2"></i>
                                            Ajouter au panier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    else:
                        // Case vide pour maintenir l'alignement sur la dernière ligne
                        echo '<div class="col-md-4"></div>';
                    endif;
                endfor; // Fin boucle colonnes
                ?>
            </div> <!-- Fin .row -->
        <?php endfor; // Fin boucle lignes ?>
    <?php endif; // Fin condition articles ?>
</div> <!-- Fin .container -->
