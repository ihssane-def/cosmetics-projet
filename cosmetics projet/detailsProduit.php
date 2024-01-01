<?php
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);

// Vérifie si l'ID du produit est fourni dans l'URL
if (isset($_GET['id_produit'])) {
    $id_produit = $_GET['id_produit'];

    // Obtient les détails du produit en fonction de l'ID
    $produit = $produitManager->obtenirProduitParId($id_produit);

    // Vérifie si le produit existe
    if ($produit) {
        // Affiche les détails du produit
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Détails du Produit</title>
            <!-- Ajoutez le lien vers le fichier CSS Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        </head>
        <body>
            <?php require_once('section.php') ?>
            <div class="container mt-5">
                <h1>Détails du Produit</h1>

                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $produit['libelle']; ?></h5>
                        <p class="card-text">Prix: <?php echo $produit['prix']; ?> €</p>
                        <!-- Vous pouvez ajouter d'autres informations du produit ici -->
                        <img src="images/<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>" class="img-fluid">
                    </div>
                </div>

                <a href="listeProduit.php" class="btn btn-warning mt-3">Retour</a>
            </div>

            <!-- Ajoutez les scripts Bootstrap à la fin du fichier -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        // Si le produit n'existe pas, redirige vers une page d'erreur ou affiche un message
        echo 'Aucun produit trouvé.';
    }
} else {
    // Si l'ID du produit n'est pas fourni, redirige vers une page d'erreur ou affiche un message
    echo 'ID du produit non spécifié.';
}
?>
