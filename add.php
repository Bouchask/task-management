<?php
require_once 'DB.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';

    if (!empty($title)) {
        $db = DB::getInstance();
        $stmt = $db->prepare("INSERT INTO tasks (title) VALUES (:title)");
        $stmt->execute(['title' => $title]);
        
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Add New Task</h1>
        <form action="add.php" method="POST">
            <div style="margin-bottom: 20px;">
                <label for="title" style="display: block; margin-bottom: 5px;">Task Title</label>
                <input type="text" id="title" name="title" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <button type="submit" class="btn btn-add" style="border: none; cursor: pointer; width: 100%;">Create Task</button>
            <a href="index.php" style="display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none;">Cancel</a>
        </form>
    </div>
</body>
</html>
