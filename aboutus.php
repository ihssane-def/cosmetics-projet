

    <!--===========Nav Bar=================-->
    <section class="nav-bar">
        <div class="logo">Your cosmetics  </div>
        <ul class="menu">
           <li><a href="index2.php">Home</a></li>
            <li><a class="active" href="abouts.php">About us</a></li>
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
    background-color: white;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background-color: pink;
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
  background-color: black;
  
  color: black;
}
.topnav  {
  overflow: hidden;
  background-color: black;
}


.topnav a:hover {
  background-color:black ;
  color: black;
  

}

.topnav a.active {
  background-color: black;
  
  color: black;
}

    </style>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/8fe048c345.js" crossorigin="anonymous"></script>
    <title>About us</title>
  
    <main class="main-grid">
            <div class="head">
            <h1 class="page-title">About us</h1>
            <p class="subtitle">Our professional range is made with quality and is cruelty free. Nothing says glamorous than our diverse collections suited for individualised taste and made to last</p>
            </div>
            <img class="main-image" src="https://images.lifestyleasia.com/wp-content/uploads/sites/3/2022/04/08153427/1_DIY_cosmetics_allows_you_to_play_a_major_role_in_caring_for_your_skin_says_Edith_Petitet-scaled.jpg">
            
            <div class="main-text">
                <h2 class="section-title">We're really great guys</h2>
                <p> Beauty to us means being comfortable in your own skin and the magical moments you create when you feel confident. Hermosa Flor is a cosmetic brand made for women by women.</p>
                <p> Derived from the Spanish meaning beautiful flower, Hermosa Flor Cosmetics aims to empower and radiate the strength that exists in our core existence one glowing beat at a time!</p>
              
                <h2 class="section-title sub">We can do all sorts of great  just for you</h2>
                <p>Beauty goes way beyond the face and hands! Read about body care and find out how to get a perfect body with the right skin care products, hair care and nail care. We also have posts dedicated to topics such as waxing or how to get rid of cellulite with home remedies.
On our beauty blog we talk about everything makeup related: what makes a good foundation,
<p>what lip color suits you best or how your eyes can shine with eyeshadow.
It's never too late to be beautiful! We teach you in our beauty blog how you can stay young with the help of cosmetic surgery and anti-aging procedures</p>
                <p></p></p> 
            </div>
      
    </main>
    
    <footer class="footer main-grid">
      <div class="footer-text">
        <p class="end">Awesome, you studied our page. Please follow us on our social media accounts. They are linked on the right site. You can`t miss the icons. If you liked our projects we would be more than happy to work for you.</p>
        <p class="copyright">© example2020</p>
      </div>
      <div class="social">
        <a href="#" class="facebook icon"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="twitter icon"><i class="fab fa-twitter"></i></a>
        <a href="#" class="instagram icon"><i class="fab fa-instagram"></i></a>
      </div>
    </footer>
  </body>
</html>
<style>* {box-sizing: border-box;}

body {
  margin: 0; 
  font-family: font-family: 'Montserrat', sans-serif;
  font-size: 1.5rem;
  background-color: black;
  color: white;
}

/*====== typography ======*/

h1 {
   font-weight: 700;
   color: #fff;
   font-size: 1.75rem;
}

h2 {
   font-weight: 700;
   color: #000;
   font-size: 1.75rem;
}

.intro {
  font-size: 1.15rem;
  margin-bottom: 2.5em;
}

span {
   color: #fda039;
}

.black {
  font-weight: 700;
  color: white;
}

/*==== main-grid Layout ====*/

.main-grid {
    display: grid;
    grid-template-columns: minmax(1em, 1fr) minmax(0px, 500px) minmax(1em, 1fr);
    grid-column-gap: 2em;
}

/* ==== Layout ====*/

.header {
  background: white;
}

.header-content{
  display: flex;
  flex-direction: row;
  grid-column: 2 / -2;
}

.logo {
  background:white;
  color: #000;
 
  margin-top: 10;
  margin-bottom: 10;
  font-size: 2.0rem;
}

.navigation {
  position: fixed;
  background: #000;
  width: 100%;
  top: 0;
  right: 0;
  bottom: 0;
  left: 100%;
  transform: translateX(0);
  transition: transform 250ms;

}

.current {
  border-bottom: 1px solid #fda039;
}

main {
  background-color: #fff;
  color: #000;
  grid-column: 2 /-2;
}

  .head {
  grid-column: 2 / -2;
  text-align: center;
  margin-top: 3em;
  margin-bottom: 3em;
}

.page-title {
  color: #000;
  font-size: 2.5rem;
  justify-self: center;
}

.main-image {
  grid-column: 2 / -2;
  object-fit: cover;
  max-width: 100%;
  display: block;
  box-shadow: 10px 10px 250px red;
}

.main-text {
  grid-column: 2 / -2;
  margin-top: 3em;
  margin-bottom: 3em;
}

.section-title::after {
  content: "";
  display: block;
  width: 100px;
  height: 3px;
  margin-top: 1em;
  background: pink;
  margin-left: auto;
  margin-right: auto;
}

.sub {
  margin-top: 3em;
}


.footer > * {
    grid-column: 2 / -2;
}

.footer {
   background: #ebebeb;  
   color: #000;
}

.social {
  order: -1;
  font-size: 1.75rem;
  padding-top: 3em;
  padding-bottom: 2em;
  display: flex;
  flex-direction: row;
  justify-content: space-around;
}

.icon {
  color: #000;
}
.icon:hover,
.icon:focus {
  cursor: mouse;
  color: pink;
}

.footer-text {
  display: flex;
  flex-direction: column;
}

.end {
  text-align: center;
  margin-bottom: 0;
}
.copyright {
  font-size: 1.1rem;
  padding-top: 1em;
  text-align: center;
  font-weight: 700;
}

.footer-text,
.copyright {
  opacity: .4;
  }
 

  @media (min-width: 600px) {
      .main-grid {
        grid-template-columns: minmax(1em, 1fr) repeat(3, minmax(20px, 320px)) minmax(1em, 1fr);
    }
    
    .open-nav,
    .close-nav {
      display: none;
    }
    
    .navigation {
      position: initial;
    }
    
    .nav-list {
      flex-direction: row;
      justify-content: flex-start;
    }
    
    .nav-link {
      margin-left: 1em;
      font-size: 1.7rem;
    }
    
    .logo {
      padding: .5em 1em;
      text-align: center;
    }
    
    .head {
      grid-column: 3 / -3;
    }
    
.page-title::after {
    content: '';
    display: block;
    width: 100%;
    height: 5px;
    background: pink;
    margin-right: auto;
    margin-left: auto;
    margin-top: 10px;
}
    
    .main-image {
      grid-column: 2;
      margin-top: 1.3em;
  
    }
    
    .main-text {
      grid-column: 3 / span 2;
      margin-top: 0;
    }
    
    .section-title::after {
  margin-left: 0;
}
    
    
    
    .footer {
      padding-top: 2em;
      padding-bottom: 2em;
    }
    
    .footer-text {
      grid-column: 2 / span 2;
    }
    
    .social {
      grid-column: span1;
    }
    
    .icon {
      margin: .5em;
    }
    
    .footer-text {
      width: 50vw;
      margin-left: 0;
      order: -1;
    }
    
    .end,
    .copyright {
      text-align: start;
    }
  }

@media(min-width: 700px) {
  .page-title::after {
    content: '';
    display: block;
    width: 160px;
    height: 5px;
    background: pink;
    margin-right: auto;
    margin-left: auto;
    margin-top: 10px;
}
}</style>
<script>
    const closeButton = document.querySelector('.close-nav');
const openButton = document.querySelector('.open-nav');
const nav = document.querySelector('.navigation');

closeButton.addEventListener("click", () => {
    nav.classList.remove('navigation-open');
});

openButton.addEventListener("click", () => {
    nav.classList.add('navigation-open');
});
</script>