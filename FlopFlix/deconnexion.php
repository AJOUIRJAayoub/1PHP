<?php
session_start();

// Supprime toutes les variables de session
$_SESSION = array();

// Détruit la session
session_destroy();

// Redirige l'utilisateur vers la page d'accueil
header('Location: FlopFlix.php');
exit();
?>
