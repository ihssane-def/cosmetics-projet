<?php
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);

$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];

    // Supprime le produit de la base de données
    $produitManager->supprimerProduit($id_produit);

    // Message de succès
    $success_message = "Le produit a été supprimé avec succès.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer Produit</title>
</head>
<body>
    <?php require_once('section.php') ?>
    <h1>Supprimer Produit</h1>

    <?php if ($success_message): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <!-- Vous pouvez ajouter d'autres éléments HTML ou rediriger l'utilisateur vers une autre page si nécessaire -->

</body>
</html>
