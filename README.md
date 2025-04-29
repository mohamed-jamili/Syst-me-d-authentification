# 📚 Systeme d'Authentification

Un projet simple d'authentification développé en PHP et MySQL.

## 🚀 Technologies utilisées
- PHP
- MySQL
- HTML/CSS
- (Optionnel) JavaScript pour l'amélioration de l'interface

## ⚙ Prérequis
- Navigateur web moderne (Chrome, Firefox, Edge...)

## 🛠 Installation et exécution

1. Installer XAMPP ou WAMP sur votre machine.
2. Copier le dossier du projet dans :
   - htdocs/ (si vous utilisez XAMPP)
   - ou www/ (si vous utilisez WAMP)
3. Démarrer les services *Apache* et *MySQL* via le panneau de contrôle.
4. Accéder à *phpMyAdmin* à l'adresse suivante :  
   http://localhost/phpmyadmin
5. Créer une nouvelle base de données (le nom doit correspondre à celui utilisé dans data.php).
6. Importer le fichier .sql fourni pour créer les tables nécessaires.
7. Configurer le fichier data.php avec vos paramètres de connexion :
   - host : localhost
   - user : root
   - password : (laisser vide par défaut)
   - dbname : nom de votre base de données
8. Accéder au projet via votre navigateur :  
   http://localhost/systeme-authentification/

## 📂 Structure du projet

```plaintext
systeme-authentification/
├── uploads/
│── data.php
│── login.php
│── register.php
│── profile.php
├── index.php
├── README.md
└── DATABASE                                                                                                                                                                                                                                                                                                                                              └     └──database.sql
