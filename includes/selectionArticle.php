<?php
// includes/selectionArticle.php - Version sécurisée

require_once 'connexion.php';

// Fonction pour récupérer les articles par catégorie (sécurisée)
function getArticlesByCategory($categorie) {
    global $bdd;
    
    // Liste blanche des catégories autorisées
    $categories_valides = ['ordinateurs', 'imprimantes', 'telephones', 'accessoires'];
    
    // Validation
    if (!in_array($categorie, $categories_valides)) {
        $categorie = 'ordinateurs';
    }
    
    // REQUÊTE PRÉPARÉE (protection injection SQL)
    $stmt = mysqli_prepare($bdd, "SELECT * FROM article WHERE categorie = ?");
    mysqli_stmt_bind_param($stmt, "s", $categorie);
    mysqli_stmt_execute($stmt);
    
    return mysqli_stmt_get_result($stmt);
}

// Pour compatibilité avec votre code existant
$listeOrdinateur = getArticlesByCategory('ordinateurs');
$listeImprimante = getArticlesByCategory('imprimantes');
$listeTelephone = getArticlesByCategory('telephones');
$listeAccessoire = getArticlesByCategory('accessoires');
?>