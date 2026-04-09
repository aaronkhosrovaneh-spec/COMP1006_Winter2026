<?php
$dsn = 'mysql:host=localhost;dbname=your_db_name';
$user = 'your_username';
$password = 'your_password';

try {
    // Create a new PDO (PHP Data Objects) connection
    $db = new PDO($dsn, $user, $password);
