<?php
// Inclure les fichiers nécessaires (connexion à la base de données, classe Produit, etc.)
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);
$produits = $produitManager->listerProduits();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link rel="stylesheet" href="gestionP.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Ajoutez votre style CSS ici */
      
    </style>
</head>
<body>
   
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="ajout_produit.php">Ajouter Produit</a>
        <a href="listeProduit.php">Liste des Produits</a>
        <a href="modifier.php">Modifier</a>
        <a href="supprimer.php">Supprimer</a>
        <a href="index2.php">Page Principal</a>
    </div>

    <!-- Contenu principal -->
    <div class="content">
        <!-- Le contenu principal de votre page va ici -->
        <h1>Gestion des Produits</h1>
        <div class="cards">
            <?php foreach ($produits as $produit): ?>
                <div class="card">
                    <div class="zoom-img">
                        <div class="img-card">
                            <!-- Assurez-vous d'ajuster le chemin de l'image en fonction de votre modèle de données -->
                            <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>">
                        </div>
                    </div>

                    <div class="text">
                        <h2><?php echo $produit['libelle']; ?></h2>
                        <!-- Vous pouvez ajouter d'autres informations du produit ici -->
                        <div class="card-box">
                            <p>Prix: <?php echo $produit['prix']; ?> €</p>
                            <!-- Ajoutez d'autres informations si nécessaire -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>
