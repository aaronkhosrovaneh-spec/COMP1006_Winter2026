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

    // File upload handling
    $imageName = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];
    $uploadPath = 'uploads/' . $imageName;

    // Move the uploaded file from temp to the uploads folder
    if (move_uploaded_file($tmpName, $uploadPath)) {
        // Insert item name and image filename into the database
        $sql = "INSERT INTO items (name, image) VALUES (:name, :image)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            'name' => $itemName, 
            'image' => $imageName
        ]);
        // Confirm successful upload to the user
        echo "Item added successfully!";
    }
}
?>
<!-- HTML form for adding an item with a file upload -->
<form method="post" enctype="multipart/form-data">
    <input type="text" name="itemName" placeholder="Item Name">
    <input type="file" name="photo">
    <button type="submit">Upload</button>
</form>
