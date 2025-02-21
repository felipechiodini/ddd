<?php

namespace Objective\Transaction\UseCases\Withdrawal;

use Objective\Transaction\Domain\TrasanctionTypeFactory;

class UseCase
{
    public function __construct(
        private \Objective\Transaction\Domain\TransactionRepository $transactionRepository,
        private \Objective\Transaction\Domain\AccountRepository $accountRepository,
        private \Objective\Transaction\Domain\AtomicityExecution $atomicityExecution
    ) {}

    public function execute(Input $input): Output
    {
        $account = $this->accountRepository->loadAccount($input->accountNumber);

        $transaction = new \Objective\Transaction\Domain\Transaction(
            $input->value,
            TrasanctionTypeFactory::create($input->paymentType)
        );

        $account->withdrawal($transaction);

        $this->atomicityExecution->execute(function() use (&$account, &$transaction) {
            $this->transactionRepository->store($account->id, $transaction);
            $this->accountRepository->save($account);
        });

        return new Output(
            $account->number,
            $account->balance
        );
    }
}
