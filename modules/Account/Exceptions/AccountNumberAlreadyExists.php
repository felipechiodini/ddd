<?php

namespace Objective\Account\Exceptions;

class AccountNumberAlreadyExists extends \Exception
{
    public function __construct()
    {
        parent::__construct('Account number already exists');
    }
}
