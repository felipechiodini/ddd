<?php

namespace Objective\Transaction\Exceptions;

class InsuficientFounds extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Saldo insuficiente');
    }
}
