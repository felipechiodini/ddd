<?php

namespace Objective\Account\UseCases\CreateAccount;

class UseCase
{
    private $accountRepository;

    public function __construct(\Objective\Account\Domain\AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    public function execute(Input $input)
    {
        if ($this->accountRepository->checkAccountNumberExists($input->accountNumber)) {
            throw new \Objective\Account\Exceptions\AccountNumberAlreadyExists('Account number already exists');
        }

        $account = new \Objective\Account\Domain\Account(
            $input->accountNumber,
            $input->balance
        );

        $this->accountRepository->store($account);

        return $account;
    }
}
