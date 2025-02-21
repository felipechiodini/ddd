<?php

namespace Objective\Transaction\Domain;

class TrasanctionTypeFactory
{
    public static function create(string $type): TransactionType
    {
        return match ($type) {
            'C' => new Credit(),
            'D' => new Debit(),
            'P' => new Pix(),
            default => throw new \DomainException("Transação tipo {$type} inválida"),
        };
    }
}
