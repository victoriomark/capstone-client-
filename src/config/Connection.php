<?php

namespace config;
class Connection
{
    private string $host = "localhost";
    private string $user = "root";
    private string $pass = "";
    private string $dbname = "capstonedatabase";

    public function Connect() {
        $connection = new \mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }


}
