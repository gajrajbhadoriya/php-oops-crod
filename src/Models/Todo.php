<?php

namespace App\Models;

class Todo
{
    private $mysql;

    public function __construct()
    {
        $this->mysql = new DBTransaction();
    }

    public function getTodos()
    {
        $stmt = $this->mysql->query("SELECT * FROM todo");
        $todos = $stmt->fetch_all(MYSQLI_ASSOC);
        return $todos;
    }

    public function addTodo($title)
    {
        $query = "INSERT INTO todo (title) VALUES ('$title')";
        $result = $this->mysql->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateTodoStatus($id, $status)
    {
        $query = "UPDATE todo SET status = $status WHERE id = $id";
        $result = $this->mysql->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTodo($id)
    {
        $query = "DELETE FROM todo WHERE id = $id";
        $result = $this->mysql->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
