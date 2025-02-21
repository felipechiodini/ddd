<?php

namespace Objective\Transaction\Domain;

class Pix implements TransactionType
{
    public function tax(): int
    {
        return 0;
    }

    public function __toString(): string
    {
        return 'P';
    }
}
