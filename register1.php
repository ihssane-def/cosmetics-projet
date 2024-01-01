
    <!--===========Nav Bar=================-->
    <section class="nav-bar">
        <div class="logo">Your cosmetics  </div>
        <ul class="menu">
           <li><a href="index2.php">Home</a></li>
            <li><a class="active" href="aboutus.php">About us</a></li>
            <li><a href="ajout_produit.php">Ajout Produit</a></li>
            <li><a href="gestion_produit.php">Liste Produit</a></li>
            <li><a href="register1.php">Regitser</a></li>
            <li><a href="login1.php">login</a></li>
            <li><a href="logout.php">log Out</a></li>
        </ul>
        </div>
    
    </section>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

* {
    box-sizing: border-box;
    margin: 0;
}

body, html {
    margin: 0;
    padding: 0;
}

/*------------------------Scroll Bar-----------------------*/
::-webkit-scrollbar {
    width: 20px;
}

::-webkit-scrollbar-thumb {
    background-color: #fde65e;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background-color: #FDE02F;
}

/*========================Nav Bar=========================*/
.nav-bar {
    display: flex;
    flex-flow: row wrap;
    width: 100%;
    height: 90px;
    background-color: #fff;
    box-shadow: 3px 3px 10px rgb(218, 165, 207);/*del*/
    align-items: center;
    justify-content: center;
    position: sticky;
    top: 0;
    z-index: 1;
}

.logo {
    flex: 1;
    font-size: 40px;
    padding: 20px;
    margin-left: 50px;
    font-family: Satisfy;
}

ul.menu {
    flex: 1;
    display: flex;
    flex-flow: row wrap;
}


.menu li {
    flex: 1;
    list-style-type: none;
    font-size: 16px;
    font-family: "Barlow Condensed";
    text-align: center;
}

.menu li a {
    text-decoration: none;
    color: rgb(220, 8, 125);/*hover*/
    text-transform: uppercase;
}

.menu li a:hover {
    color: rgb(112, 25, 87);
    text-decoration: underline;
}

.topnav a.active {
  background-color: hwb(290 31% 16%);
  
  color: red;
}
.topnav  {
  overflow: hidden;
  background-color: #fafafa89;
}


.topnav a:hover {
  background-color:hwb(290 31% 16%) ;
  color: rgb(255, 255, 255);
  

}

.topnav a.active {
  background-color: hwb(290 31% 16%);
  
  color: pink;
}

    </style>

<?php
session_start();
require_once 'dbconfig.php';

// Vérifie si l'utilisateur est déjà connecté, le redirige vers la page d'accueil
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Vérifie si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();

    // Récupère les valeurs du formulaire
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash du mot de passe
    $email = $_POST['email'];

    // Évite les injections SQL en utilisant des déclarations préparées
    $query = "INSERT INTO utilisateur (username, password, email) VALUES (?, ?, ?)";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("sss", $username, $password, $email);

    // Exécute la requête
    if ($stmt->execute()) {
        // Enregistre les informations de l'utilisateur dans la session après l'inscription réussie
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;

        // Redirige vers la page d'accueil après l'inscription réussie
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Erreur lors de l'inscription. Veuillez réessayer.";
    }

    // Ferme la déclaration
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<div class="login-box">
    <h2>Inscription</h2>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

  
  <form method="post" action="">
    <div class="user-box">
      <input type="text" name="username" required>
      <label for = username>username</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required>
      <label for = password>Password</label>
    </div>
    <div class="user-box">
      <input type="email" name="email" required>
      <label for = email>email</label>
    </div>

    <div class="container">
  <button class="btn">se connecter</button>
</div>

    </form>
    </div>
    <style>
        
        html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background:pink;
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.login-box .user-box input:focus ~ label,
.login-box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #03e9f4;
  font-size: 12px;
}

.login-box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #03e9f4;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.login-box a:hover {
  background: #03e9f4;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #03e9f4,
              0 0 25px #03e9f4,
              0 0 50px #03e9f4,
              0 0 100px #03e9f4;
}

.login-box a span {
  position: absolute;
  display: block;
}

.login-box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #03e9f4);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.login-box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #03e9f4);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.login-box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #03e9f4);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s;
  position:center ;

}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.login-box a span:nth-child(4) {
  bottom: -100%;
  left: 10;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #03e9f4);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}

    </style>
     <footer class="footer main-grid">
      <div class="social">
        <a href="#" class="facebook icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="twitter icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="instagram icon"><i class="fab fa-instagram"></i></a>
      </div>
    </footer>
    <style>
      .social {
  order: -1;
  font-size: 1.75rem;
  padding-top: 3em;
  padding-bottom: 2em;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

.social {
      grid-column: span1;
    }
    .container {
  position: relative;
  width: 100%;
  max-width: 400px;
}


.container .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);

  color: black;
  font-size: 12px;
  padding: 10px 30px;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  text-align: center;
}

.container .btn:hover {
  background-color: pink;
  color: white;
}
      
      </style>
      
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
  float: high;
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
  </body>
  </html>
  