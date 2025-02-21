<?php

namespace Objective\Transaction\Domain;

interface TransactionRepository
{
    public function store(int $accountId, Transaction $transaction): void;
}
