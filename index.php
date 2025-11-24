<?php

$conn = mysqli_connect("127.0.0.1", 'root', "", "todolist");

if (!$conn) {
    die("Erreur connexion : " . mysqli_connect_error());
}


if (isset($_POST['add'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    if (!empty($title)) {
        $query = "INSERT INTO todo (title, done) VALUES ('$title', 0)";
        mysqli_query($conn, $query);
    }
}


if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);
    mysqli_query($conn, "DELETE FROM todo WHERE id = $id");
}


if (isset($_POST['undo'])) {
    $id = intval($_POST['id']);
    mysqli_query($conn, "UPDATE todo SET done = 1 - done WHERE id = $id");
}


$taches = [];
$result = mysqli_query($conn, "SELECT * FROM todo ORDER BY created_at DESC");

while ($row = mysqli_fetch_assoc($result)) {
    $taches[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>To Do List</title>
</head>
<body>
    <div class="container">
        <header>
            <h1 class="text-center my-4">To Do List</h1>
        </header>

        <form method="POST" class="d-flex justify-content-center gap-3">
            <input class="form-control w-50" type="text" placeholder="Task Title" name="title">
            <button class="btn btn-outline-primary" type="submit" name="add">Add</button>
        </form>

        
        <ul class="mt-5" style="list-style: none; padding-left: 0;">
            <?php foreach ($taches as $tach): ?>
                <li class="mt-3 border p-3 d-flex justify-content-between rounded 
                    <?= $tach['done'] ? 'bg-success text-white' : 'bg-warning' ?>">
                    
                    <?= $tach['title'] ?>
                    <div>    
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $tach['id'] ?>">
                            <button class="btn btn-primary btn-sm" name="undo">Toggle</button>
                        </form>

                            
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $tach['id'] ?>">
                            <button class="btn btn-danger btn-sm" name="delete">Delete</button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
