<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil - Bibliothèque</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Merriweather', serif;
      background: #f5f3ef;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 260px;
      background:rgb(74, 37, 2);
      color: #fff;
      padding: 30px 20px;
      height: 100vh;
      position: fixed;
      box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    }

    .sidebar h2 {
      font-size: 1.7rem;
      margin-bottom: 30px;
      /* color:black; */
      display: flex;
      align-items: center;
      gap: 12px;
      text-shadow: 2px 2px 4px rgb(248, 171, 3);
      color: rgb(248, 171, 3);
      
    }

    .sidebar a {
      display: flex;
      align-items: center;
      color: #d7ccc8;
      text-decoration: none;
      padding: 12px 10px;
      margin: 10px 0;
      transition: background 0.3s;
      border-radius: 6px;
    }

    .sidebar a i {
      margin-right: 12px;
    }

    .sidebar a:hover {
      background: rgba(248, 170, 3, 0.25);
      color: #fff;
    }

    .main {
      margin-left: 260px;
      flex: 1;
      padding: 40px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 40px;
    }

    .topbar .logo {
      font-size: 2rem;
      font-weight: bold;
      color:rgb(248, 170, 3 );
    }

    .topbar .user {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .topbar .user img {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      border: 3px solid rgb(107, 59, 4);
    }

    .profile-card {
      background: #fff;
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.1);
      min-height: 500px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .profile-header {
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 30px;
    }

    .profile-header img {
      width: 130px;
      height: 130px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid rgb(107, 59, 4);
    }

    .profile-info h2 {
      font-size: 1.8rem;
      color: #3e2723;
    }

    .profile-info p {
      font-size: 1.1rem;
      color: #5d4037;
      margin-top: 5px;
    }

    .logout-btn {
      margin-top: 30px;
      padding: 12px 26px;
      background-color:rgb(107, 59, 4);
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      width: fit-content;
      transition: background 0.3s ease;
    }

    .logout-btn:hover {
      background-color:rgb(175, 150, 8));
    }

    .profile-footer {
      margin-top: 60px;
      padding-top: 20px;
      border-top: 1px solid #ddd;
      font-size: 1rem;
      color: #7b5e57;
      text-align: center;
    }

  </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
  <h2><i class="fa-solid fa-book"></i> Bibliothèque</h2>
  <a href="#"><i class="fa-solid fa-house"></i> Accueil</a>
  <a href="#"><i class="fa-solid fa-user"></i> Mon Profil</a>
  <a href="#"><i class="fa-solid fa-book-open-reader"></i> Mes Lectures</a>
  <a href="#"><i class="fa-solid fa-calendar-days"></i> Activités</a>
  <a href="#"><i class="fa-solid fa-gears"></i> Paramètres</a>
  <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
</div>

<!-- Main content -->
<div class="main">
  <div class="topbar">
    <div class="logo">Ma Bibliothèque</div>
    <div class="user">
      <span><?= htmlspecialchars($user['name']) ?></span>
      <img src="uploads/<?= htmlspecialchars($user['profile_pic']) ?>" alt="Profil">
    </div>
  </div>

  <div class="profile-card">
    <div class="profile-header">
      <img src="uploads/<?= htmlspecialchars($user['profile_pic']) ?>" alt="Profil">
      <div class="profile-info">
        <h2><?= htmlspecialchars($user['name']) ?></h2>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Date d'inscription:</strong> <?= $user['created_at'] ?></p>
      </div>
    </div>

    <a href="logout.php" class="logout-btn">Déconnexion</a>

    <div class="profile-footer">
      📚 Merci de faire partie de notre bibliothèque. Continuez votre aventure de lecture avec passion !
    </div>
  </div>
</div>

</body>
</html>
