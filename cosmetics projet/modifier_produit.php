<?php
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);
$produit = array();

// Récupère les catégories depuis la base de données
$categories = $produitManager->listerCategories();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_produit'])) {
    $id_produit = $_POST['id_produit'];
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $id_categorie = $_POST['id_categorie'];

    // Met à jour le produit dans la base de données
    if ($produitManager->modifierProduit($id_produit, $libelle, $prix, $id_categorie)) {
        $success_message = "Le produit a été modifié avec succès.";
        header('Location: modifier.php');
    } else {
        $error_message = "Erreur lors de la modification du produit. Veuillez réessayer.";
    }
}

// Récupère les détails du produit à partir de la base de données
if (isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];
    $produit = $produitManager->obtenirProduitParId($id_produit);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>
    <!-- Liens vers Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Ajoutez votre propre style ici si nécessaire */
    </style>
</head>
<body>
    <?php require_once('section.php') ?>
    

    <div class="container mt-5">
        <h1>Modifier un Produit</h1>

        <?php if (isset($success_message)): ?>
            <p class="text-success"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <?php if (isset($error_message)): ?>
            <p class="text-danger"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form method="post" action="">
            <input type="hidden" name="id_produit" value="<?php echo isset($produit['id']) ? $produit['id'] : ''; ?>">

            <div class="form-group">
                <label for="libelle">Libellé:</label>
                <input type="text" class="form-control" name="libelle" value="<?php echo $produit['libelle']; ?>" required>
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" class="form-control" name="prix" value="<?php echo $produit['prix']; ?>" required>
            </div>

            <div class="form-group">
                <label for="id_categorie">Catégorie:</label>
                <select class="form-control" name="id_categorie" required>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?php echo $categorie['id']; ?>" <?php echo (isset($produit['id_categorie']) && $produit['id_categorie'] == $categorie['id']) ? 'selected' : ''; ?>>
                            <?php echo $categorie['nom_categorie']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="modifier_produit" class="btn btn-primary">Modifier Produit</button>
            <a href="modifier.php" class="btn btn-secondary">Retour</a>
        </form>
    </div>

    <!-- Liens vers Bootstrap JS et jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>
</html>

