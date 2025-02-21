<?php

namespace Objective\Account\UseCases\LoadAccount;

class Input
{
    public function __construct(public int $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }
}
