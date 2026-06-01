<?php

namespace App\Store\Infrastructure;

use App\Database\DatabaseRepository;
use App\Store\Domain\StoreRepository as DomainStoreRepository;
use App\Store\Domain\Store;

class StoreRepository implements DomainStoreRepository
{
    public function __construct(
        private DatabaseRepository $databaseRepository,
    ) {
    }

    public function save(Store $store): void
    {
        $this->databaseRepository->prepare('INSERT INTO stores (name) VALUES (:name)', [
            'name' => (string) $store->name
        ]);
    }
}