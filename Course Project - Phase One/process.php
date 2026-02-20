<?php
// Grab form data
$host = 'localhost'; 
$db   = 'time_tracker';
$user = 'root';
$password = '';

// Connect to the database
$dsn = "mysql:host=$host;dbname=$db";

try {
   $pdo = new PDO ($dsn, $user, $password); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
?>
