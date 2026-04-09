<?php
require 'db.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize the username input to prevent XSS attacks
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    // Get the raw password input
    $password = $_POST['password']; 
    // Get the reCAPTCHA response from the form
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    $secretKey = "YOUR_SECRET_KEY";

    // Verify the reCAPTCHA response by sending it to Google
    $apiResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    // Decode the JSON response from Google
    $responseData = json_decode($apiResponse, true);

    // Check if reCAPTCHA verification was successful
    if ($responseData['success']) {
        // Hash the password securely before storing in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an SQL statement to insert the new user
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $db->prepare($sql);
        // Bind the parameters to prevent SQL injection
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();

        // Redirect to the login page after successful registration
        header("Location: login.php");
    }
