<?php

namespace App\Store\Domain;

readonly class Store
{
    public function __construct(
        public Name $name
    ) {
    }

    public static function create(string $name): self
    {
        return new self(
            new Name($name)
        );
    }
}