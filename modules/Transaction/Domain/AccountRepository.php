<?php

namespace Objective\Transaction\Domain;

interface AccountRepository
{
    public function loadAccount(int $accountNumber): Account;
    public function save(Account $account): void;
}
