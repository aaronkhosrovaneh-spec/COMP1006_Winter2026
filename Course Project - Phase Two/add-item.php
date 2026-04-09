<?php
session_start();
require 'db.php';

// Authorization Check: Restrict page access to logged-in users
if (!isset($_SESSION['userId'])) {
