<?php

namespace Objective\Transaction\Infra;

use Illuminate\Support\Facades\DB;
use Objective\Transaction\Domain\Transaction;

class TransactionRepository implements \Objective\Transaction\Domain\TransactionRepository
{
    public function store(int $accountId, Transaction $transaction): void
    {
        DB::table('account_transactions')
            ->insert([
                'account_id' => $accountId,
                'amount' => $transaction->amount,
                'tax' => $transaction->tax(),
                'type' => $transaction->transactionType
            ]);
    }
}
