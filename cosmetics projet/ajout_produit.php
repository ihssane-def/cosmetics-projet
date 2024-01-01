 <!--===========Nav Bar=================-->
 <section class="nav-bar">
        <div class="logo">Your cosmetics  </div>
        <ul class="menu">
           <li><a href="index2.php">Home</a></li>
            <li><a  href="aboutus.php">About us</a></li>
            <li><a class="active" href="ajout_produit.php">Ajout Produit</a></li>
            <li><a href="gestion_produit.php">Liste Produit</a></li>
            <li><a href="register1.php">Regitser</a></li>
            <li><a href="login1.php">login</a></li>
            <li><a href="logout.php">log Out</a></li>
        </ul>
        </div>
    
    </section>
    <script>
  // Regular expression from W3C HTML5.2 input specification:
// https://www.w3.org/TR/html/sec-forms.html#email-state-typeemail
var emailRegExp = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

new Vue({
  // root node
  el: "#app",
  // the instance state
  data: function() {
    return {
      name: "John Doe",
      email: {
        value: "jo@hnd.oe",
        valid: true
      },
      features: ["Reactivity", "Encapsulation", "Data Binding"],
      selection: {
        member: "0",
        framework: "vue",
        features: []
      },
      message: {
        text: `Dear Mr. President,\n...`,
        maxlength: 255
      },
      submitted: false
    };
  },
  methods: {
    // submit form handler
    submit: function() {
      var postData = {
        name: this.name,
        email: this.email.value
      }
      
      // send postData to the server
      console.log(postData)
      // axios.post('/serverPath', postData)
      
      this.submitted = true;
    },
    // validate by type and value
    validate: function(type, value) {
      if (type === "email") {
        this.email.valid = this.isEmail(value) ? true : false;
      }
    },
    // check for valid email adress
    isEmail: function(value) {
      return emailRegExp.test(value);
    },
    // check or uncheck all
    checkAll: function(event) {
      this.selection.features = event.target.checked ? this.features : [];
    }
  },
  watch: {
    // watching nested property
    "email.value": function(value) {
      this.validate("email", value);
    }
  }
});

</script>
<?php
session_start();

// Vérifie si l'utilisateur est connecté, sinon le redirige vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Inclure la connexion à la base de données et la classe Produit si nécessaire
require_once 'dbconfig.php';
require_once 'Produit.php';

$db = new Database();
$produitManager = new Produit($db);
$categories = $produitManager->listerCategories();



// Vérifie si le formulaire d'ajout de produit a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_produit'])) {
    // Récupère les valeurs du formulaire
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $id_categorie = $_POST['id_categorie'];
    
    // Gestion de l'image (ajoutez la logique de téléchargement si nécessaire)
    // Récupère le fichier image téléchargé
if (isset($_FILES['image'])) {
    $fileName = $_FILES["image"]["name"];
    $fileSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png', 'jfif'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));

    }
    if (!in_array($imageExtension, $validImageExtension)) {
        echo
        "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        
    } else if ($fileSize > 1000000000) {
        echo
        "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
       
    } else {
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        $folder = $_SERVER['DOCUMENT_ROOT'] . '/doss/images/';
        move_uploaded_file($tmpName, $folder . $newImageName);

        
        // die($newImageName);

       // Ajoute le produit à la base de données seulement si le téléchargement de l'image a réussi
if (!isset($error_message) && $produitManager->ajouterProduit($libelle, $prix, $id_categorie, $newImageName)) {
    $success_message = "Le produit a été ajouté avec succès.";
} else {
    $error_message = "Erreur lors de l'ajout du produit. Veuillez réessayer.";
}
        
    }




    // Ajoute le produit à la base de données
    // if ($produitManager->ajouterProduit($libelle, $prix, $id_categorie, $image)) {
    //     $success_message = "Le produit a été ajouté avec succès.";
    // } else {
    //     $error_message = "Erreur lors de l'ajout du produit. Veuillez réessayer.";
    // }
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="styleSheet" href="ajp.css" />

</head>
<body>

<div id="social-hover">               
      <ul>     
      <li class="ts-rss"><a href="http://feeds.feedburner.com/minhtriet09it" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">RSS Feeds</div></a></li>           
      <li class="ts-facebook"><a href="https://www.facebook.com/miinhtriet09it" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">Facebook</div></a></li>
      <li class="ts-twitter"><a href="https://twitter.com/minhtriet09it" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">Twitter</div></a></li>
      <li class="ts-gplus"><a href="https://plus.google.com/+DOMINHTRIET" rel="nofollow" target="_blank"><div class="ts-icon"></div><div class="ts-text">Google+</div></a></li>                   
      </ul>               
      </div>
    <div id="app">

<form class="vue-form" @submit.prevent="submit">
    <div>
    <form method="post" action="" enctype="multipart/form-data">
        <div>
        <label for="libelle">Libellé:</label>
        <input type="text" name="libelle" id="name" required="" v-model="name"required>
</div>
   
<div>
        <label  class="label" for="prix">Prix:</label>
        <input type="text" name="prix" id="email" required=""  v-model="email.value"required>
</div>
       
        <h4>choose the category that interests you</h4>
        <p class="select">
        <label for="id_categorie">Catégorie:</label>
        <select name="id_categorie" required class="budget" v-model="selection.member">>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['nom_categorie']; ?></option>
            <?php endforeach; ?>
        </select>
            </p>
            </div>
    
    <!-- Champ pour le téléchargement de l'image -->
    <label for="image">Image:</label>
    <input type="file" name="image" accept="image/*" required>

    <br>

        <input type="submit" name="ajouter_produit" value="Ajouter Produit">
    </form>
            </div>
    <!-- ... Le reste de votre code HTML ... -->

</body>
</html>
