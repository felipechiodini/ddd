<?php

namespace Objective\Transaction\Domain;

use Objective\Transaction\Exceptions\InsuficientFounds;

class Account
{
    public function __construct(public int $id, public int $number, public float $balance)
    {
    }

    public function withdrawal(Transaction $transaction)
    {
        $valueToWithdraw = $transaction->amount + $transaction->tax();

        if ($this->balance < $valueToWithdraw) {
            throw new InsuficientFounds('Saldo insuficiente');
        }

        $this->balance = $this->balance - $valueToWithdraw;
    }
}
