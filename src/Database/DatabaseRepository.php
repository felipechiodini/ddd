<?php

namespace App\Database;

interface DatabaseRepository
{
    public function prepare(string $query, array $parameters): void;
}