<?php
require 'process.php';

//Get task ID
$id = $_GET['id'];

// Prepare statement
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
