<?php

namespace Objective\Account;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public $bindings = [
        \Objective\Account\UseCases\LoadAccount\UseCase::class => \Objective\Account\UseCases\LoadAccount\UseCase::class,
        \Objective\Account\Domain\AccountRepository::class => \Objective\Account\Infra\AccountRepository::class,
    ];

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
