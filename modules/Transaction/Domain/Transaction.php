<?php

namespace Objective\Transaction\Domain;

class Transaction
{
    public function __construct(public int|float $amount, public TransactionType $transactionType)
    {
        $this->amount = $amount;
        $this->transactionType = $transactionType;
    }

    public function tax(): int|float
    {
        return $this->amount * ($this->transactionType->tax() / 100);
    }
}
