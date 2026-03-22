<?php
// Define the target directory
$target_dir = "uploads/";
$file_name = $_FILES['photo']['name'];
$target_file = $target_dir . basename($file_name);
$tmp_name = $_FILES['photo']['tmp_name'];

// Move the file to the uploads folder
if (move_uploaded_file($tmp_name, $target_file)) {
    echo "The file has been uploaded successfully! [cite: 35]";
    echo "<br><img src='$target_file' alt='Profile Picture' style='width:200px;'> [cite: 36]";
} else {
    echo "Sorry, there was an error uploading your file.";
}
?>
