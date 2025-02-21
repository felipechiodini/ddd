<?php

namespace Objective\Transaction\Domain;

class Debit implements TransactionType
{
    public function tax(): int
    {
        return 3;
    }

    public function __toString(): string
    {
        return 'D';
    }
}
