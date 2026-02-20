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
    <!-- Priority selection -->
    <div class="mb-3">
        <label for="priority" class="form-label">Priority Level</label>
        <select name="priority" id="priority" class="form-select">
            <option value="Low" <?php if($task['priority'] == 'Low') echo 'selected'; ?>>Low Priority</option>
            <option value="Medium" <?php if($task['priority'] == 'Medium') echo 'selected'; ?>>Medium Priority</option>
            <option value="High" <?php if($task['priority'] == 'High') echo 'selected'; ?>>High Priority</option>
        </select>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Update Task</button>
    </div>
</form>
