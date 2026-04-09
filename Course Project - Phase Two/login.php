<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query to select the user with the given username
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($sql);
    // Execute the prepared statement with the username parameter
    $stmt->execute(['username' => $username]);
