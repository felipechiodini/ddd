<?php

namespace Objective\Transaction\Domain;

interface TransactionType
{
    public function tax(): int;
    public function __toString(): string;
}
