<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>
<body>
    
</body>
</html>
<?php
// Assurez-vous d'inclure les fichiers nécessaires (dbconfig.php, Produit.php, etc.)
require_once 'dbconfig.php';
require_once 'Produit.php';
 require_once('section.php');

$db = new Database();
$produitManager = new Produit($db);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_categorie'])) {
    $id_categorie_selected = $_GET['id_categorie'];
    $produits = $produitManager->listerProduitsParCategorie($id_categorie_selected);
    ?>
    
    <!-- Affichez la liste des produits par catégorie -->
    <div class="cards">
        <?php foreach ($produits as $produit): ?>
            <div class="card">
                <div class="zoom-img">
                    <div class="img-card">
                        <img src="<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>">
                    </div>
                </div>

                <div class="text">
                    <h2><?php echo $produit['libelle']; ?></h2>
                    <div class="card-box">
                        <p>Prix: <?php echo $produit['prix']; ?> €</p>
                        <!-- Ajoutez d'autres informations si nécessaire -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php
} else {
    // Gérez le cas où aucun id_categorie n'est fourni
    echo 'Aucune catégorie sélectionnée.';
}
?>
