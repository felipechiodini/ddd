<?php

namespace Objective\Transaction\Domain;

use Closure;

interface AtomicityExecution
{
    public function execute(Closure $callback);
}
