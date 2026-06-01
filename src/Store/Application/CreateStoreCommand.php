<?php

namespace App\Store\Application;

use App\Store\Domain\Store;
use App\Store\Domain\StoreRepository;

class CreateStoreCommand
{
    public function __construct(
        private StoreRepository $repository
    ) {
    }

    public function handle(CreateInput $createInput): Store
    {
        $store = Store::create($createInput->name); 
        $this->repository->save($store);
        
        return $store;
    }
}