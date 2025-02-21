<?php

namespace Objective\Transaction\Tests;

use Objective\Transaction\Domain\Credit;
use Objective\Transaction\Domain\Debit;
use Objective\Transaction\Domain\Pix;
use Tests\TestCase;

class PaymentsTest extends TestCase
{
    public function test_pix_tax()
    {
        $pix = new Pix();

        $this->assertEquals(0, $pix->tax());
    }

    public function test_credit_tax()
    {
        $pix = new Credit();

        $this->assertEquals(5, $pix->tax());
    }

    public function test_debit_tax()
    {
        $pix = new Debit();

        $this->assertEquals(3, $pix->tax());
    }
}
