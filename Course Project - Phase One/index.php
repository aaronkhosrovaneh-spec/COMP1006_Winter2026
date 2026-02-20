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

    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // Execute statement
    $stmt->execute([
        ':name' => $name,
        ':category' => $category,
        ':priority' => $priority,
        ':due_date' => $due_date,
        ':time' => $time
    ]);
}

// Fetch all tasks
$stmt = $pdo->query("SELECT * FROM tasks ORDER BY due_date ASC");

// Retrieve results
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Time Tracker</title>
</head>
<!-- Bootstrap container -->
<body class="container mt-5">
    <!-- Task creation form -->
    <h2>Add New Task</h2>
    <form method="post" class="mb-5">
        <!-- Task name -->
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Task Name" required>
        </div>

        <!-- Task category -->
        <div class="mb-3">
            <input type="text" name="category" class="form-control" placeholder="Category">
        </div>

        <!-- Priority selection -->
        <div class="mb-3">
            <label for="priority" class="form-label">Priority Level</label>
            <select name="priority" id="priority" class="form-select">
                <option value="Low">Low Priority</option>
                <option value="Medium">Medium Priority</option>
                <option value="High">High Priority</option>
            </select>
        </div>
        
        <!-- Due date -->
        <div class="mb-3">
            <input type="date" name="due_date" class="form-control">
        </div>

        <!-- Time spent in minutes -->
        <div class="mb-3">
            <input type="number" name="time" class="form-control" placeholder="Time Spent (minutes)">
        </div>

        <!-- Submit button -->
        <button type="submit" name="add_task" class="btn btn-primary">Add Task</button>
    </form>

    <!-- Display task list -->
    <h2>Your Tasks</h2>
    <!-- Bootstrap-styled table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Task</th><th>Category</th><th>Priority</th><th>Due Date</th><th>Time (min)</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through tasks and display them -->
            <?php foreach ($tasks as $task): ?>
            <tr>
                <!-- Output task values -->
                <td><?= $task['name'] ?></td>
                <td><?= $task['category'] ?></td>
                <td><?= $task['priority'] ?></td>
                <td><?= $task['due_date'] ?></td>
                <td><?= $task['time'] ?></td>
