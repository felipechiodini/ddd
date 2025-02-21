<?php

namespace Objective\Transaction\Infra;

use Illuminate\Support\Facades\DB;
use Objective\Transaction\Domain\Account;

class AccountRepository implements \Objective\Transaction\Domain\AccountRepository
{
    public function loadAccount(int $accountNumber): Account
    {
        $model = DB::table('accounts')
            ->select('id', 'balance')
            ->where('number', $accountNumber)
            ->first();

        if ($model === null) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException('Conta não encontrada');
        }

        return new Account(
            $model->id,
            $accountNumber,
            $model->balance
        );
    }

    public function save(Account $account): void
    {
        DB::table('accounts')
            ->where('number', $account->number)
            ->update([
                'balance' => $account->balance
            ]);
    }
}
