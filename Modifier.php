<?php
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);

// Récupère la liste de tous les produits
$listeProduits = $produitManager->listerProduits();



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <!-- Ajoutez le lien vers le fichier CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php require_once('section.php') ?>
    <div class="container mt-5">
        <h1>Liste des Produits</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Libellé</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeProduits as $produit): ?>
                    <tr>
                        <td><?php echo $produit['libelle']; ?></td>
                        <td><?php echo $produit['prix']; ?></td>
                        <td><?php echo $produit['nom_categorie']; ?></td>
                        <td>
                            <form method="get" action="modifier_produit.php">
                                <input type="hidden" name="id_produit" value="<?php echo $produit['id']; ?>">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="gestion_produit.php" class="btn btn-warning">Retour</a>
    </div>

    <!-- Ajoutez les scripts Bootstrap à la fin du fichier -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
  <div id="social-hover">               
      <ul>     
      <li class="ts-rss"><a href="http://feeds.feedburner.com/minhtriet09it" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">RSS Feeds</div></a></li>           
      <li class="ts-facebook"><a href="https://www.facebook.com/miinhtriet09it" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">Facebook</div></a></li>
      <li class="ts-twitter"><a href="https://twitter.com/minhtriet09it" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">Twitter</div></a></li>
      <li class="ts-gplus"><a href="https://plus.google.com/+DOMINHTRIET" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">Google+</div></a></li>                   
      </ul>               
      </div>
      <style>
          #social-hover {
  float: right;
  position: relative;
  height: 40px;
  }
  
  #social-hover li{margin: 5px}
  
  #social-hover a{
  font-family: 'Open Sans', Helvetica, Arial, sans-serif;
  width: 40px;
  transition:width 0.4s;
  -webkit-transition:width 0.4s;
  -moz-transition:width 0.4s;
  }
  #social-hover a:hover{
  width: 115px;
  }
  #social-hover ul, #top-menu ul { margin: 0; }
  #social-hover li,
  #social-hover li a,
  #social-hover li .ts-icon,
  #social-hover li .ts-text {
  display: block;
  position: relative;
  width: 40px;
  height: 40px;
  }
  #social-hover li,
  #social-hover li a,
  #social-hover li .ts-text {
  float: left;
  width: auto;
  overflow: hidden;
  }
  #social-hover li a {
  width: 40px;
  line-height: 40px;
  color: #FFF;
  font-size: 12px;
  font-weight: bold;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
  }
  #social-hover li.ts-rss a { background-color: #F88F16; }
  #social-hover li.ts-rss .ts-icon { background: url("https://lh6.googleusercontent.com/-oQGmKZI7eJs/UlLJ-4f81II/AAAAAAAACV4/F3IcLsUKqsY/s16/rss.png") no-repeat center center; }
  #social-hover li .ts-icon { float: left; }
  #social-hover li.ts-facebook a { background-color: #3B5998; }
  #social-hover li.ts-facebook .ts-icon { background: url("https://lh6.googleusercontent.com/-EcJsEGuE1QA/UlLJ-nbtGOI/AAAAAAAACVs/dizwfAR_0KU/s16/facebook.png") no-repeat center center; }
  #social-hover li.ts-twitter a { background-color: #3CF; }
  #social-hover li.ts-twitter .ts-icon { background: url("https://lh6.googleusercontent.com/-k9dXtRP_KG4/UlLJ_VpWtJI/AAAAAAAACWA/fsGPNo1tkjw/s16/twitter.png") no-repeat center center; }
  #social-hover li.ts-gplus a { background-color: #BD3518; }
  #social-hover li.ts-gplus .ts-icon { background: url("https://lh6.googleusercontent.com/-zwl2BMOWHWs/UlLJ-yjUF_I/AAAAAAAACWE/2z5vF-txseA/s16/gplus.png") no-repeat center center; }
      </style>
  </body>
  </html>
  
  
  
</body>
</html>

