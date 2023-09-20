<?php

include dirname(__DIR__, 1) . '/includes/header.php';

use App\Controllers\TodoController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $todoController = new TodoController();

    $id = $_POST['id'];
    // $status = $_POST['status'];

    $todoController->delete($id);

    // var_dump($todoController);
    header('Location: ../index.php');
    exit;
}