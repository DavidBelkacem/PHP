<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <title>Tiki's Fruits - Notre Catalogue</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="icon" href="./src/src_footer_header/logo.svg" />
    <link rel="stylesheet" href="./styles/catalogue.css" />
    <link rel="stylesheet" href="./styles/footer_header/style_footer.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@200&display=swap"
      rel="stylesheet"
    />
    <!-- google font : Righteous -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Righteous&display=swap"
      rel="stylesheet"
    />
    <meta
      name="description"
      content="Pour toutes vos envies fruitées, faites confiance à Tiki's Fruits. Vous trouverez dans notre catalogue les meilleurs Fruits-Exotiques !"
    />
    <meta charset="utf-8" />
  </head>
  <body>
    <!-- Code below = Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img
            id="logo-header"
            src="./src/src_footer_header/wlogo.svg"
            alt=""
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- <div class="d-flex justify-content-around"> -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbarlink">
            <li class="nav-item">
              <a href="./index.html" class="nav-link active" aria-current="page"
                >Accueil</a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="true"
              >
                Equipe
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="./equipe.html">Notre équipe</a>
                </li>
                <li>
                  <a class="dropdown-item" href="./equipe/cv_aly.html">Aly </a>
                </li>
                <li>
                  <a class="dropdown-item" href="./equipe/cv_marguerite.html"
                    >Marguerite</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="./equipe/cv_loris.html"
                    >Loris</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="./equipe/cv_david.html"
                    >David</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./catalogue.html">Catalogue</a>
            </li>
            <li class="icons_header">
              <a href="./login.html">
                <img
                  class="icon_hover"
                  src="./src/src_footer_header/profile.png"
                  alt="icon_profile"
                  width="30"
                  height="30"
                />
              </a>
              <a href="">
                <img
                  class="icon_hover"
                  src="./src/src_footer_header/cart.png"
                  alt="icon_cart"
                  width="30"
                  height="30"
                />
              </a>
              <a href="">
                <img
                  class="icon_hover"
                  src="./src/src_footer_header/search.png"
                  alt="icon_search"
                  width="30"
                  height="30"
                />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End of Header -->


<?php 
    $nameItem = "banana";
    $priceItem = "2 €/kg";
    $image_url = "https://media.lactualite.com/2014/08/banane.jpg";
    echo "Product : $nameItem" . "<br>";
    echo "Price : $priceItem" . "<br>";
    echo "<img src=\"$image_url\" alt=\"banana\">";
?>

    <!-- Code below = Footer -->
    <footer>
      <div class="logo_footer">
        <img src="./src/src_footer_header/logo.svg" alt="logo de Tiki's" />
      </div>

      <div class="footer_wrapper">
        <div class="footer_left">
          <hr />
          <div class="location">
            <img
              src="./src/src_footer_header/home.png"
              width="40"
              height="40"
              alt="icone d une maison"
            />
            <p>TIKI'S<br />45 rue de l'épice<br />45236 Bourg-la-Reine</p>
          </div>
          <div class="phone_number">
            <img
              src="./src/src_footer_header/headset.png"
              width="40"
              height="40"
              alt="photo d'un micro-casque"
            />
            <p>02 32 65 98 56</p>
          </div>
        </div>

        <div class="footer_center">
          <hr />
          <div class="legal_mentions">
            <p>INFORMATIONS</p>
            <p>Politique de confidentialité</p>
            <p>Conditions Générales de Vente</p>
            <p>Politique de confidentialité</p>
            <p>Politique de retour</p>
          </div>
        </div>

        <div class="footer_right">
          <hr />
          <p>NOS RÉSEAUX</p>
          <div class="icons_social">
            <img
              src="./src/src_footer_header/facebook.png"
              width="45"
              height="45"
              alt="logo de facebook"
            />
            <img
              src="./src/src_footer_header/instagram.png"
              width="45"
              height="45"
              alt="logo d'instagram"
            />
            <img
              src="./src/src_footer_header/twitter.png"
              width="45"
              height="45"
              alt="logo de twitter"
            />
          </div>
        </div>
      </div>
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>

  <!-- End of Footer -->
</html>