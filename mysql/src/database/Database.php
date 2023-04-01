<?php

namespace App\database;

use mysqli;

class Database
{
    public $link;
    public $error;

    public function __construct()
    {
        $this->connectdb();
    }

    public function connectdb()
    {
        $this->link = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
        if (!$this->link) {
            $this->error = "Connection Fail" . $this->link->error->connect_error;
            return $this->error;
        }
    }

    /**
     * Select or Read data
     */
    public function select($query)
    {
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}