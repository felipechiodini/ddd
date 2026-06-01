<?php

namespace App\Store\Domain;

class Name
{
    public function __construct(
        private string $name
    ) {
        if (strlen($name) < 3) {
            throw new \InvalidArgumentException('Name must be at least 3 characters long');
        }

        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
            throw new \InvalidArgumentException('Name can only contain letters, numbers and spaces');
        }

        if (strlen($name) > 255) {
            throw new \InvalidArgumentException('Name cannot be longer than 255 characters');
        }

        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}