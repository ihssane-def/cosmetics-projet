<?php
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Détruit la session
session_destroy();

// Redirige l'utilisateur vers la page de connexion après la déconnexion
header("Location: index.php");
exit();
?>
