<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        //!✏======drna htmlspecialchars bach n7miw les champs de saisie mn XSS=========
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        //!✏==hna bach nchifriw le mot de passe dyal l'utilisateur=====
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $img = $_FILES['profile_pic'];
        //!✏===kat9aleb wach email deja utilisé======
        $checkStmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $checkStmt->bindParam(':email', $email, PDO::PARAM_STR);
        $checkStmt->execute();
        //!✏===ila kan l'email deja utilisé kat3ti error====
        if ($checkStmt->rowCount() > 0) {
            $error = "Cet email est déjà utilisé.";
        } else {
        //!✏===ila ma kanch l'email deja utilisé kat9aleb 3la l'image wach mnasba====
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        //!✏===ila ma kantch l'image mnasba kat3ti error====
            if (!in_array($img['type'], $allowed_types)) {
                $error = "Type de fichier non autorisé.";
            } else {
        //
                $img_name = time() . '_' . basename($img['name']);
                //!✏===kat7ot l'image f uploads====
                $target = "uploads/" . $img_name;
        
                if (move_uploaded_file($img['tmp_name'], $target)) {
                  
                    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, profile_pic) VALUES (:name, :email, :password, :profile_pic)");
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                    $stmt->bindParam(':profile_pic', $img_name, PDO::PARAM_STR);
                    $stmt->execute();
                    $_SESSION['user'] = $pdo->lastInsertId();
                    header("Location: profile.php");
                    exit;
                } else {
                    $error = "Erreur lors du téléchargement du fichier.";
                }
            }
        }
    }

    if (isset($_POST['login'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['id'];
            header("Location: profile.php");
            exit;
        } else {
            $error = "Email ou mot de passe incorrect";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Bibliothèque - Authentification</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    * { box-sizing: border-box; }

    body {
      margin: 0;
      font-family: 'Georgia', serif;
      background: url('https://cdn.pixabay.com/photo/2016/11/29/04/17/books-1868068_1280.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      overflow: hidden;
    }
    .navbar {
      position: fixed;
      height: 90px;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      /* background: transparent; */
      background: rgba(255, 248, 230, 0.8);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0 20px;
    }
    .navbar h2 {
      color: black !important;
      text-shadow: 4px 1px 4px rgb(177, 163, 12);
    }

    .navbar-brand {
      font-family: 'Merriweather', serif;
      font-size: 2.5rem;
      color: white !important;
      display: flex;
      align-items: center;
    }

    .navbar-brand img {
      width: 80px;
      height: 80px;
      margin-right: 15px;
    }

    .nav-buttons {
      display: flex;
      gap: 15px;
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
      transform: translateY(-2px);
    }

    .nav-btn:active {
      transform: translateY(0);
    }

    .bubbles {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: 0;
    }

    .bubble {
      position: absolute;
      bottom: -50px;
      font-size: 1.5rem;
      animation: float 15s infinite ease-in;
      opacity: 0;
    }

    @keyframes float {
      0% { transform: translateY(0); opacity: 0; }
      20% { opacity: 1; }
      80% { opacity: 1; }
      100% { transform: translateY(-1000px); opacity: 0; }
    }

    .container {
      z-index: 2;
      background: rgba(255, 248, 230, 0.95);
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      width: 1000px;
      height: 500px;
      backdrop-filter: blur(4px);
      animation: fadeIn 1s ease;
      display: flex;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      width: 1000px;
      height: 500px;
      backdrop-filter: blur(4px);
      animation: fadeIn 1s ease;
      display: flex;
      overflow: hidden;
      margin-top: 80px;
    }
    
    .left{
      flex: 1;
      display: flex;
      justify-content: center;
      background-image: url('uploads/photo1.jpg');
      background-repeat: no-repeat;
      position: relative;
      width: 100%;
      height: 100%;
      background-size: cover;
      background-position: center;
      border-radius: 15px ;
      margin-right: 20px;
    }
    
    .left .overlay {
      position: absolute;
      top: 0;
      left: 0;
      color:white;
      width: 100%;
      height: 100%;
      text-align: center;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
      border-radius: 15px;
    }
    
    .font1{
      font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
    
    .font2{
      font-family:'Brush Script MT', cursive;
      font-size:30px;
      text-shadow: 2px 2px 4px rgb(248, 171, 3);
      color: rgb(248, 171, 3);
    }
    
    .overlay h1 {
      font-size: 2rem;
      color:rgb(255, 255, 255) ;
      text-shadow: 4px 2px 4px rgb(187, 94, 8);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      text-align: center;
      font-family: 'Georgia', serif;
      color: #3e2723;
    }

    form {
      display: none;
      flex-direction: column;
      gap: 1rem;
      border-radius: 15px;
      padding: 20px;
      height: 100%;
    }
    
    form.active { display: flex; }

    input, button {
      padding: 12px;
      font-size: 1rem;
      border-radius: 8px;
      border: 1px solid #a1887f;
    }

    input:focus {
      outline: none;
      border-color: #6d4c41;
      box-shadow: 0 0 8px rgba(109, 76, 65, 0.5);
    }

    button {
      background-color: #6d4c41;
      color: white;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background-color:rgb(184, 130, 6);
    }

    .switch {
      text-align: center;
      color: #5d4037;
      cursor: pointer;
      text-decoration: underline;
    }

    .error {
      color: red;
      text-align: center;
    }

    .social-links {
      display: flex;
      gap: 20px;
      margin-bottom: 10px;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }

    .social-links a {
      color: #333;
      font-size: 24px;
      transition: color 0.3s, transform 0.3s;
    }

    .social-links a:hover {
      color:rgb(200, 96, 12);
      transform: scale(1.3);
    }
</style>
</head>
<body>


  <nav class="navbar">
    <a class="navbar-brand" href="index.php">
      <img src="uploads/logo.svg" alt="Logo" style="width: 50px; height: 50px; margin-right: 10px;">
      <h2> Notre Bibliothèque</h2>
    </a>
    <div class="nav-buttons">
      <!-- <a class="nav-btn" href="register.php">Connexion</a> -->
    </div>
  </nav>

<div class="bubbles" id="bubbles"></div>


<div class="container">
  <div class="left">
    <div class="overlay">
    <h1>Bibliothèque</h1>
    <!-- <p class="font1">Bienvenue dans notre bibliothèque en ligne. <br></p> -->
    <p class="font2">📚Les livres ne changent pas le monde, ils changent les lecteurs, et les lecteurs changent le monde🍂</p>
    </div>
   
    <!-- <img src="uploads/photo1.jpg" alt="Books" style="width: 100%; border-radius: 15px;"> -->
  </div>
  <div class="right">
  <h2 id="form-title">Se connecter à la Bibliothèque</h2>
  <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
  <div class="form-1">
    <form id="login-form" method="post" class="active">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <button type="submit" name="login">Connexion</button>
      <div class="switch" onclick="switchForm('register')">Créer un compte</div>
    </form>
    
  </div>

  

  <form id="register-form" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="file" name="profile_pic" accept="image/*" required>
    <button type="submit" name="register">S'inscrire</button>
    <div class="switch" onclick="switchForm('login')">Déjà inscrit ? Se connecter</div>
  </form>
  <div class="social-links">
    <a href="https://facebook.com" target="_blank">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a href="https://instagram.com" target="_blank">
        <i class="fab fa-instagram"></i>
    </a>
    <a href="https://twitter.com" target="_blank">
        <i class="fab fa-twitter"></i>
    </a>
    <a href="https://whatsapp.com" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://youtube.com" target="_blank">
        <i class="fab fa-youtube"></i>
    </a>
</div>
  </div>
  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function switchForm(type) {
    const login = document.getElementById('login-form');
    const register = document.getElementById('register-form');
    const title = document.getElementById('form-title');

    if (type === 'register') {
      login.classList.remove('active');
      register.classList.add('active');
      title.textContent = "Créer un compte à la Bibliothèque";
    } else {
      register.classList.remove('active');
      login.classList.add('active');
      title.textContent = "Se connecter à la Bibliothèque";
    }
  }

  const emojis = ['📚', '📖', '✍️', '📘', '📓', '📔', '💡'];
  const container = document.getElementById('bubbles');

  for (let i = 0; i < 25; i++) {
    const bubble = document.createElement('div');
    bubble.className = 'bubble';
    bubble.style.left = `${Math.random() * 100}%`;
    bubble.style.fontSize = `${20 + Math.random() * 20}px`;
    bubble.style.animationDuration = `${10 + Math.random() * 20}s`;
    bubble.style.animationDelay = `${Math.random() * 5}s`;
    bubble.textContent = emojis[Math.floor(Math.random() * emojis.length)];
    container.appendChild(bubble);
  }
</script>

</body>
</html>
