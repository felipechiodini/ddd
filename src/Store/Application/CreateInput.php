<?php

namespace App\Store\Application;

class CreateInput
{
    public function __construct(
        public string $name
    ) {
    }
}