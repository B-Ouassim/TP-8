<?php 

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
        <div class="search">
            <form class="form-inline my-2 my-lg-0 d-flex justify-content-center gap-3" method="POST">
                <input class="form-control mr-sm-2" type="search" placeholder="Task Title" name="title">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Add</button>
            </form>
            <ul style="list-style: none; padding-left: 0;" class="mt-5">
                <li class="mt-3 border border-1 p-3 d-flex justify-content-between rounded" style="background: #9bc258ff;">Task 1 
                    <div>
                        <button class="btn btn-primary btn-sm" name="done">Done</button>
                        <button class="btn btn-danger btn-sm" name="delete">Delete</button>
                    </div>
                </li>
                <li class="mt-3 border border-1 p-3 d-flex justify-content-between rounded" style="background: #9bc258ff;">Task 2 
                    <div>
                        <button class="btn btn-primary btn-sm" name="done">Done</button>
                        <button class="btn btn-danger btn-sm" name="delete">Delete</button>
                    </div>
                </li>
                <li class="mt-3 border border-1 p-3 d-flex justify-content-between rounded" style="background: #eded6cff;">Task 3 
                    <div>
                        <button class="btn btn-primary btn-sm" name="undo">Undo</button>
                        <button class="btn btn-danger btn-sm" name="delete">Delete</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>