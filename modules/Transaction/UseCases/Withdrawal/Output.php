<?php

namespace Objective\Transaction\UseCases\Withdrawal;

class Output
{
    public function __construct(public string $accountNumber, public float $balance)
    {
    }
}
