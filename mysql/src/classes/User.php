<?php

namespace App\classes;

use App\database\Database;

class User
{
    public $db;


    public function __construct()
    {
        $this->db = new Database();
    }


    public function getUsers()
    {
        $query ="SELECT u.user_id, u.first_name, u.last_name, 
                    AVG(t.correct) AS avg_correct, 
                    MAX(t.time_taken) AS most_recent_test_time
                FROM user u
                LEFT JOIN test_result t
                ON u.user_id = t.user_id
                GROUP BY u.user_id, u.first_name, u.last_name";

        return $this->db->select($query);
    }
}