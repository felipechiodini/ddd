<?php

namespace Objective\Transaction\Tests;

use Tests\TestCase;

class TransactionDomainTest extends TestCase
{
    public function test_tax_calcualtor()
    {
        $transaction = new \Objective\Transaction\Domain\Transaction(100, new \Objective\Transaction\Domain\Credit());

        $this->assertEquals(5, $transaction->tax());
    }

    public function test_withdrawal()
    {
        $account = new \Objective\Transaction\Domain\Account(1, 1, 100);

        $transaction = new \Objective\Transaction\Domain\Transaction(100, new \Objective\Transaction\Domain\Pix());

        $account->withdrawal($transaction);

        $this->assertEquals(0, $account->balance);
        $this->assertEquals(0, $transaction->tax());
    }
}
