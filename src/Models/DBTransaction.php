<?php

namespace App\Models;

class DBTransaction
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "oops";
    private $data;

    public function __construct()
    {
        $this->data = new \mysqli($this->host, $this->user, $this->password, $this->database);

        if ($this->data->connect_error) {
            die("Connection failed: " . $this->data->connect_error);
        }
    }

    public function query($query)
    {
        return $this->data->query($query);
    }
}
