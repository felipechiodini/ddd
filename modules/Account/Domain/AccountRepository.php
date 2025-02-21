<?php

namespace Objective\Account\Domain;

interface AccountRepository
{
    public function loadAccount(int $accountNumber): Account;
    public function store(Account $account): void;
    public function checkAccountNumberExists(int $accountNumber): bool;
}
