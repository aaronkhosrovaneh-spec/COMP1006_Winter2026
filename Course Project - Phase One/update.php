<?php
require 'process.php';

//Get task ID
$id = $_GET['id'];

// Prepare statement
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");

// Execute query
$stmt->execute([$id]);

// Fetch task data
$task = $stmt->fetch();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // SQL query to update task values
    $sql = "UPDATE tasks SET name = ?, category = ?, priority = ?, due_date = ?, time = ? WHERE id = ?";
    // Prepare and execute update statement
    $pdo->prepare($sql)->execute([
        $_POST['name'], $_POST['category'], $_POST['priority'], $_POST['due_date'], $_POST['time'], $id
    ]);
    // Redirect user to main page
    header("Location: index.php");
}
?>

<!-- Task update form -->
<form method="post">
</form>
