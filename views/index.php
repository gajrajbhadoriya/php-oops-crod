<?php
session_start();
include '../views/includes/header.php';

use App\Controllers\TodoController;



$todos = new TodoController();
$todos = $todos->index();


?>

<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        select {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
</head>

<body>
    <h1>Todo List</h1>
    <div class="container">
        <h1><?php $user; ?></h1>
        <form method="post" action="actions/add.php">
            <input type="text" name="title" placeholder="Enter Todo Title" required>
            <button type="submit">Add Todo</button>
        </form>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todos as $todo) : ?>
                    <tr>
                        <td><?php echo $todo['id']; ?></td>
                        <td><?php echo $todo['title']; ?></td>
                        <td>
                            <form method="post" action="actions/changeStatus.php">
                                <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="0" <?php if ($todo['status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Incomplete</option>
                                    <option value="1" <?php if ($todo['status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Complete</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="actions/delete.php">
                                <input type="hidden" name="id" value="<?php echo $todo['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>