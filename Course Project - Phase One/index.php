<?php
require 'process.php';

// Process form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_task'])) {
    // Sanitize text inputs
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'] ?? null;
    $time = filter_input(INPUT_POST, 'time', FILTER_VALIDATE_INT);

    // SQL query using named placeholders
    $sql = "INSERT INTO tasks (name, category, priority, due_date, time)
            VALUES (:name, :category, :priority, :due_date, :time)";
