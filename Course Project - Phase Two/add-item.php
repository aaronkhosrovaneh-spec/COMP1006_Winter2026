<?php
session_start();
require 'db.php';

// Authorization Check: Restrict page access to logged-in users
if (!isset($_SESSION['userId'])) {
    // If the user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize the item name to prevent XSS attacks
    $itemName = filter_input(INPUT_POST, 'itemName', FILTER_SANITIZE_SPECIAL_CHARS);
