<?php

namespace Objective\Account\Infra;

use Illuminate\Support\Facades\DB;
use Objective\Account\Domain\Account;

class AccountRepository implements \Objective\Account\Domain\AccountRepository
{
    public function loadAccount(int $accountNumber): Account
    {
        $model = DB::table('accounts')
            ->where('number', $accountNumber)
            ->first();

        if (!$model) {
            throw new \Illuminate\Database\Eloquent\ModelNotFoundException();
        }

        return new Account(
            $model->number,
            $model->balance
        );
    }

    public function store(Account $account): void
    {
        DB::table('accounts')
            ->insert([
                'number' => $account->number,
                'balance' => $account->balance
            ]);
    }

    public function checkAccountNumberExists(int $accountNumber): bool
    {
        return DB::table('accounts')
            ->where('number', $accountNumber)
            ->exists();
    }
}
