<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bibliothèque </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Open+Sans&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      margin: 0;
      padding: 0;
    }

    .bg-brown {
      background-color: #5a2d00;
    }

    .nav-btn {
      display: inline-block;
      padding: 12px 24px; 
      margin: 0 8px;
      font-family: 'Open Sans', sans-serif;
      font-size: 18px; 
      color: #333;
      text-decoration: none;
      background-color: #ffeecc; 
      border: 2px solid #5a2d00; 
      border-radius: 8px; 
      transition: all 0.3s ease;
      cursor: pointer;
      font-weight: 600;
    }

    .nav-btn:hover {
      background-color: #5a2d00; 
      color: white;
      border-color: #5a2d00;
      transform: translateY(-2px);
    }

    .nav-btn:active {
      transform: translateY(0);
    }

    .nav-btn.active {
      background-color: #5a2d00;
      color: white;
      border-color: #5a2d00;
    }

    .hero {
      min-height: 100vh;
      background: linear-gradient(rgba(90, 45, 0, 0.6), rgba(90, 45, 0, 0.6)),
      url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center;
      background-size: cover;
      color: white;
      display: flex;
      align-items: center;
      position: relative;
      overflow: hidden;
      z-index: 1;
    }

    h1, .navbar-brand, h2.section-title {
      font-family: 'Merriweather', serif;
    }

    .content-section {
      background-color: white;
      padding: 60px 0;
    }

    .feature-section {
      background-color: #fff8e1;
      padding: 60px 0;
    }

    .feature-box {
      background-color: #fff8e1;
      border-radius: 15px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      text-align: center;
      padding: 30px;
      transition: transform 0.3s ease;
    }

    .feature-box:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      background-color: #ffeecc;
      color: #5a2d00;
      font-size: 30px;
      display: inline-block;
      padding: 15px;
      border-radius: 50%;
      margin-bottom: 20px;
    }

    .feature-title {
      font-size: 1.25rem;
      font-weight: bold;
      color: #5a2d00;
    }

    .feature-text {
      color: #5a2d00;
    }

    .footer {
      background-color: #5a2d00;
      color: white;
      padding: 40px 0;
    }

    .btn-warning {
      padding: 12px 28px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-warning:hover {
      background-color: #5a2d00;
      color: white;
      transform: translateY(-2px);
    }
    #backg{
      position: fixed;
      height: 80px;
      /* position: absolute; */
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background:transparent;
      /* background-color:rgba(90, 45, 0, 0.32); */
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      padding: 0 20px;
    }
    #h2{
      text-shadow: 4px 1px 4px rgb(14, 13, 2);
      color: yellow;
      
    }
    h1{
      text-shadow: 4px 1px 4px rgb(228, 221, 157);
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark  px-4 py-3" id="backg" >
    <img src="uploads/logo.svg" alt="" class="logo" width="50" height="50">
    <a class="navbar-brand fw-bold ms-2" href="index.php" id="h2"> <h2>Notre Bibliothèque</h2></a>
    <div class="ms-auto d-flex align-items-center nav-buttons">
      <a class="nav-btn nav-btn-solid" href="register.php">Connexion</a>
    </div>
  </nav>

  <header class="hero">
    <div class="container text-white">
      <div class="col-lg-8">
        <h1 class="display-4 fw-bold">Bienvenue à Notre Bibliothèque</h1>
        <p class="lead my-4">Votre porte d'entrée vers la connaissance et l'imagination. Découvrez des milliers de livres et embarquez pour d'innombrables aventures.</p>
        <a href="register.php" class="btn btn-warning text-dark fw-bold">Connexion</a>
      </div>
    </div>
  </header>

  <section class="feature-section">
    <div class="container">
      <h2 class="text-center section-title mb-5">Pourquoi choisir notre bibliothèque ?</h2>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="feature-box">
            <div class="feature-icon">📘</div>
            <div class="feature-title">Collection Étendue</div>
            <p class="feature-text">Accédez à des milliers de livres couvrant divers genres, des classiques aux best-sellers contemporains.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-box">
            <div class="feature-icon">📖</div>
            <div class="feature-title">Emprunt Facile</div>
            <p class="feature-text">Processus d'emprunt simple et pratique en quelques clics, sans procédures compliquées.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-box">
            <div class="feature-icon">👥</div>
            <div class="feature-title">Accès Communautaire</div>
            <p class="feature-text">Ouverte à tous les membres de la communauté, promouvant la littératie et l'apprentissage continu.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-box">
            <div class="feature-icon">🔖</div>
            <div class="feature-title">Expérience Personnalisée</div>
            <p class="feature-text">Suivez vos livres empruntés, recevez des recommandations personnalisées et gérez votre parcours de lecture.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h2 class="section-title mb-4">Prêt à commencer à lire ?</h2>
          <p class="lead">Rejoignez notre bibliothèque aujourd'hui et embarquez pour des aventures sans fin à travers les pages de notre collection.</p>
          <a href="register.php" class="btn btn-warning text-dark fw-bold mt-3">Créer un Compte</a>
        </div>
        <div class="col-lg-6">
          <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="img-fluid rounded" alt="Livres de bibliothèque">
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Notre Bibliothèque</h3>
          <p>Votre porte d'entrée vers la connaissance et l'imagination. Découvrez, apprenez et explorez avec notre vaste collection de livres.</p>
        </div>
        <div class="col-md-3">
          <h4>Heures d'Ouverture</h4>
          <ul class="list-unstyled">
            <li>Lundi - Vendredi: 9h00 - 20h00</li>
            <li>Samedi: 10h00 - 18h00</li>
            <li>Dimanche: 12h00 - 17h00</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h4>Contactez-nous</h4>
          <ul class="list-unstyled">
            <li>123 Avenue des Livres, Ville Littéraire</li>
            <li>+212 691917048</li>
            <li>info@notrebibliotheque.com</li>
          </ul>
        </div>
      </div>
      <hr class="my-4 bg-light">
      <div class="text-center">
        <p class="mb-0">© 2025 Notre Bibliothèque. Tous droits réservés.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
