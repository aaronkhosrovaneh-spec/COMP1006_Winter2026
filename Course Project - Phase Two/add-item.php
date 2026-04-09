<?php
session_start();
require 'db.php';

// Authorization Check: Restrict page access to logged-in users
if (!isset($_SESSION['userId'])) {
    // If the user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
