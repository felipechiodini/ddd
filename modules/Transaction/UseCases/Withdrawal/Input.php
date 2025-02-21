<?php

namespace Objective\Transaction\UseCases\Withdrawal;

class Input
{
    public function __construct(
        public readonly string $accountNumber,
        public readonly int|float $value,
        public readonly string $paymentType
    ) {
    }
}
