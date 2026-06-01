<?php

namespace App\Database;

use PDO;
use PDOStatement;

class MySQLConnection extends PDO implements DatabaseRepository
{
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=my_database';
        $username = 'root';
        $password = 'password'; 
        parent::__construct($dsn, $username, $password);
    }

    public function prepare(string $query, array $options = []): PDOStatement|false
    {
        return parent::prepare($query, $options);
    }
}