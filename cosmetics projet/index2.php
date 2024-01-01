<?php  
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);
$categories = $produitManager->listerCategories();
$produits = $produitManager->listerProduits();
?>
<html>
<body>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--===========Nav Bar=================-->
    <section class="nav-bar">
        <div class="logo">Your cosmetics  </div>
        <ul class="menu">
           <li><a class="active" href="index2.php">Home</a></li>
            <li><a href="aboutus.php">About us</a></li>
            <li><a href="ajout_produit.php">Ajout Produit</a></li>
            <li><a href="gestion_produit.php">Liste Produit</a></li>
            <li><a href="register1.php">Regitser</a></li>
            <li><a href="login1.php">login</a></li>
            <li><a href="logout.php">log Out</a></li>
        </ul>
        </div>
    
    </section>
    
    <!--===============Banner================-->
    <section class="banner">
        <div class="banner-text-item">
            <div class="banner-heading">
                <h1>Find your Best product</h1>
            </div>
            <form class="form" method="get" action="liste_produits_par_categorie.php">
                <select name="id_categorie" class="form-select form-select-lg mb-3" aria-label="Large select example" required>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['nom_categorie']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary btn-lg">Chercher</button>
            </form>
        </div>
    </section>
    
  
    <!--==============Places===================-->
    <section class="places">
        <div class="places-text">
            <small>FEATURED  best products </small>
            <h2>Favourite products</h2>
        </div>

        <div class="cards">
            <?php foreach ($produits as $produit): ?>
                <div class="card">
                <div class="zoom-img">
                    <?php if (isset($produit['image'])): ?>
                    <img src="images/<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>">
                    <?php else: ?>
                <p>Aucune image disponible</p>
                <?php endif; ?>
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
    </section>

    <!--===========Footer=================-->
    <div class="footer">
        <div class="links">
            <h3>Quick Links</h3>
            <ul>
                <li>Offers & Discounts</li>
                <li>Get Coupon</li>
                <li>Contact Us</li>
                <li>About</li>
            </ul>
        </div>
        <div class="links">
            <h3>New Products</h3>
            <ul>
                <li>Woman Cloth</li>
                <li>Fashion Accessories</li>
                <li>Man Accessories</li>
                <li>Rubber made Toys</li>
            </ul>
        </div>
        
    </div>

    </body>
    </html>
    