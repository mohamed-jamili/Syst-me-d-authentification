<?php
$host = 'localhost';
$db = 'bibliobase';
$user = 'root';
$pass = '';


$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}
?>
