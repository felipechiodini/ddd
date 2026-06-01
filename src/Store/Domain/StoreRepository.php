<?php

namespace App\Store\Domain;

interface StoreRepository
{
    public function save(Store $store): void;
}