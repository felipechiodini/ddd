<?php

namespace Objective\Transaction\Domain;

class Credit implements TransactionType
{
    public function tax(): int
    {
        return 5;
    }

    public function __toString(): string
    {
        return 'C';
    }
}
