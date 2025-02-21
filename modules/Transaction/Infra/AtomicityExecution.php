<?php

namespace Objective\Transaction\Infra;

use Closure;
use Illuminate\Support\Facades\DB;

class AtomicityExecution implements \Objective\Transaction\Domain\AtomicityExecution
{
    public function execute(Closure $callback)
    {
        DB::transaction($callback);
    }
}
