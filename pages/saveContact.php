<?php
// ============================================
// pages/saveContact.php - VERSION SÉCURISÉE
// Conserve votre structure mais sécurise tout
// ============================================

// Démarrer la session pour garder les données en cas d'erreur
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inclure la connexion
include("../includes/connexion.php");

// ============================================
// 1. RÉCUPÉRATION ET NETTOYAGE DES DONNÉES
// ============================================

// Récupérer avec des valeurs par défaut pour éviter les erreurs
$nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : '';
$mail = isset($_POST["mail"]) ? trim($_POST["mail"]) : '';
$numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : '';
$texte = isset($_POST["texte"]) ? trim($_POST["texte"]) : '';

// ============================================
// 2. VALIDATION SIMPLE MAIS EFFICACE
// ============================================

$erreurs = [];

// Validation du nom (2-100 caractères)
if (empty($nom)) {
    $erreurs[] = "Le nom est obligatoire";
} elseif (strlen($nom) < 2 || strlen($nom) > 100) {
    $erreurs[] = "Le nom doit contenir entre 2 et 100 caractères";
} else {
    // Nettoyer le nom (protection XSS)
    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
}

// Validation de l'email
if (empty($mail)) {
    $erreurs[] = "L'email est obligatoire";
} elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $erreurs[] = "L'email n'est pas valide";
} elseif (strlen($mail) > 255) {
    $erreurs[] = "L'email est trop long";
} else {
    // Nettoyer l'email
    $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
}

// Validation du numéro (optionnel - ajustez selon vos besoins)
if (!empty($numero)) {
    // Supprimer tous les caractères non numériques
    $numero = preg_replace('/[^0-9]/', '', $numero);
    
    // Validation basique pour un numéro français (ex: 10 chiffres)
    if (strlen($numero) < 8 || strlen($numero) > 15) {
        $erreurs[] = "Le numéro de téléphone n'est pas valide";
    }
} else {
    // Si le numéro est optionnel, mettre NULL dans la base
    $numero = NULL;
}

// Validation du message
if (empty($texte)) {
    $erreurs[] = "Le message est obligatoire";
} elseif (strlen($texte) < 10) {
    $erreurs[] = "Le message doit contenir au moins 10 caractères";
} elseif (strlen($texte) > 2000) {
    $erreurs[] = "Le message est trop long (2000 caractères maximum)";
} else {
    // Nettoyer le message (protection XSS)
    $texte = htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');
}

// ============================================
// 3. GESTION DES ERREURS
// ============================================

if (!empty($erreurs)) {
    // Stocker les erreurs et les données dans la session
    $_SESSION['contact_erreurs'] = $erreurs;
    $_SESSION['old_contact_data'] = [
        'nom' => $_POST["nom"] ?? '',
        'mail' => $_POST["mail"] ?? '',
        'numero' => $_POST["numero"] ?? '',
        'texte' => $_POST["texte"] ?? ''
    ];
    
    // Rediriger vers le formulaire avec les erreurs
    header("Location:../index.php?page=contact&save=non");
    exit;
}

// ============================================
// 4. ENREGISTREMENT SÉCURISÉ EN BASE
// ============================================

try {
    
        $requete = "INSERT INTO contact (nom, mail, numero, messages) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($bdd, $requete);
        
        if (!$stmt) {
            throw new Exception("Erreur de préparation: " . mysqli_error($bdd));
        }
        
        // Lier les paramètres (numero est une chaîne pour préserver les 0)
        mysqli_stmt_bind_param($stmt, "ssss", $nom, $mail, $numero, $texte);
    
    // Exécuter la requête
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Erreur d'exécution: " . mysqli_stmt_error($stmt));
    }
    
    // Fermer le statement
    mysqli_stmt_close($stmt);
    
    // SUCCÈS - Stocker les infos pour l'affichage
    $_SESSION['contact_success'] = [
        'nom' => $nom,
        'mail' => $mail,
        'date' => date('d/m/Y à H:i')
    ];
    
    // Nettoyer les données temporaires
    if (isset($_SESSION['old_contact_data'])) {
        unset($_SESSION['old_contact_data']);
    }
    if (isset($_SESSION['contact_erreurs'])) {
        unset($_SESSION['contact_erreurs']);
    }
    echo 'succes';
    
    // Rediriger vers la page de confirmation
    header("Location:../index.php?page=contact&save=oui");
    exit;
    
} catch (Exception $e) {
    // Log de l'erreur (pour vous, pas pour l'utilisateur)
    error_log("Erreur saveContact: " . $e->getMessage());
    
    // Message générique pour l'utilisateur
    $_SESSION['contact_erreurs'] = ["Une erreur technique est survenue. Veuillez réessayer."];
    $_SESSION['old_contact_data'] = [
        'nom' => $_POST["nom"] ?? '',
        'mail' => $_POST["mail"] ?? '',
        'numero' => $_POST["numero"] ?? '',
        'texte' => $_POST["texte"] ?? ''
    ];
    
    header("Location:../index.php?page=contact&save=non");
    exit;
}
?>