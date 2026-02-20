<?php
require 'process.php';

//Check if ID was provided
if (isset($_GET['id'])) {
    // Prepare statement
    $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
    //Execute statement
    $stmt->execute([$_GET['id']]);
}
