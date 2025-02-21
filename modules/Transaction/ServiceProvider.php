<?php

namespace Objective\Transaction;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public $bindings = [
        \Objective\Transaction\UseCases\Withdrawal\UseCase::class => \Objective\Transaction\UseCases\Withdrawal\UseCase::class,
        \Objective\Transaction\Domain\TransactionRepository::class => \Objective\Transaction\Infra\TransactionRepository::class,
        \Objective\Transaction\Domain\AccountRepository::class => \Objective\Transaction\Infra\AccountRepository::class,
        \Objective\Transaction\Domain\AtomicityExecution::class => \Objective\Transaction\Infra\AtomicityExecution::class,
    ];

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
