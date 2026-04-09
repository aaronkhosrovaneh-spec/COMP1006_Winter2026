<?php
require 'db.php';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize the username input to prevent XSS attacks
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);

    
