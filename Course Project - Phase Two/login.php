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
    // Fetch the user record as an associative array
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Set session variables for the logged-in user
        $_SESSION['userId'] = $user['userId'];
        $_SESSION['username'] = $user['username'];
        // Redirect the user to the dashboard page
        header("Location: dashboard.php");
        exit;
    }
    else {
        // Display an error message if credentials are invalid
        echo "Invalid credentials.";
    }
}
?>
