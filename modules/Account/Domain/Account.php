<?php

namespace Objective\Account\Domain;

class Account
{
    public function __construct(public int $number, public float $balance)
    {
        $this->number = $number;
        $this->balance = $balance;
    }
}
