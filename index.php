<?php
require_once 'DB.php';

$db = DB::getInstance();
$query = $db->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>My Tasks</h1>
        <a href="create.php" class="btn btn-add">Add New Task</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($tasks) > 0): ?>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($task['id']); ?></td>
                            <td><?php echo htmlspecialchars($task['title']); ?></td>
                            <td>
                                <span class="status status-<?php echo htmlspecialchars($task['status']); ?>">
                                    <?php echo htmlspecialchars($task['status']); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($task['created_at']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $task['id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No tasks found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
