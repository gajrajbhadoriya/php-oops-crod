<?php

include dirname(__DIR__, 1) . '/includes/header.php';

use App\Controllers\TodoController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $todo = new TodoController();
    $todo->add($title);

    header('Location: ../index.php');
}
