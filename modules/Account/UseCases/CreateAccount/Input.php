<?php

namespace Objective\Account\UseCases\CreateAccount;

class Input
{
    public function __construct(public int $accountNumber, public float|null $balance)
    {
    }
}
