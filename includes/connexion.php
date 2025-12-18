<?php
// includes/connexion.php - Version sécurisée

// 1. Configuration (à adapter)
$db_host = "localhost";
$db_user = "root";      // Créez cet utilisateur
$db_pass = "root@serveur"; // Changez ça
$db_name = "noukpotechlab";

// 2. Connexion avec gestion d'erreur
$bdd = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// 3. Vérifier la connexion
if (!$bdd) {
    // NE PAS AFFICHER mysqli_connect_error() en production
    error_log("Erreur connexion MySQL: " . mysqli_connect_error());
    die("Erreur de connexion à la base de données.");
}

// 4. Définir l'encodage
mysqli_set_charset($bdd, "utf8mb4");

// 5. Fonction helper pour échapper
function escape($data) {
    global $bdd;
    return htmlspecialchars(mysqli_real_escape_string($bdd, trim($data)), ENT_QUOTES, 'UTF-8');
}
?>