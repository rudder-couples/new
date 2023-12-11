<?php

session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task']) && !empty(trim($_POST['task']))) {
        $task = htmlspecialchars($_POST['task']);
        array_push($_SESSION['tasks'], $task);
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    $_SESSION['tasks'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>

    <h1>To-Do List</h1>

    <form method="post" action="index.php">
        <label for="task">Add a new task:</label>
        <input type="text" id="task" name="task" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php foreach ($_SESSION['tasks'] as $task) : ?>
            <li><?php echo $task; ?></li>
        <?php endforeach; ?>
    </ul>

    <p><a href="index.php?action=clear">Clear All Tasks</a></p>

</body>
</html>
