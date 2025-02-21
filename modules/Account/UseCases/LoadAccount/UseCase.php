<?php

namespace Objective\Account\UseCases\LoadAccount;

use Objective\Account\Domain\Account;

class UseCase
{
    private $accountRepository;

    public function __construct(\Objective\Account\Domain\AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function execute(Input $input): Account
    {
        return $this->accountRepository->loadAccount($input->accountNumber);
    }
}
