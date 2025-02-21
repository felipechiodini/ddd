<?php

namespace Objective\Transaction\Tests;

use Tests\TestCase;

class TransactionTest extends TestCase
{
    public function test_payment_pix()
    {
        $this->mock(\Objective\Transaction\Domain\AccountRepository::class, function ($mock) {
            $mock->shouldReceive('loadAccount')
                ->once()
                ->andReturn(new \Objective\Transaction\Domain\Account(1, 1, 100));
        });

        $this->mock(\Objective\Transaction\Domain\AtomicityExecution::class, function ($mock) {
            $mock->shouldReceive('execute')
                ->once();
        });

        $data = [
            'numero_conta' => '1',
            'valor' => 100,
            'forma_pagamento' => 'P'
        ];

        $this->postJson('/transacao', $data)
            // ->assertJsonStructure(['numero_conta', 'saldo'])
            ->assertStatus(201);
    }

    public function test_payment_credit()
    {
        $this->mock(\Objective\Transaction\Domain\AccountRepository::class, function ($mock) {
            $mock->shouldReceive('loadAccount')
                ->once()
                ->andReturn(new \Objective\Transaction\Domain\Account(1, 1, 100));
        });

        $this->mock(\Objective\Transaction\Domain\AtomicityExecution::class, function ($mock) {
            $mock->shouldReceive('execute')
                ->once();
        });

        $data = [
            'numero_conta' => '1',
            'valor' => 100,
            'forma_pagamento' => 'P'
        ];

        $this->postJson('/transacao', $data)
            ->assertJsonStructure(['numero_conta', 'saldo'])
            ->assertStatus(201);
    }

    public function test_payment_debit()
    {
        $this->mock(\Objective\Transaction\Domain\AccountRepository::class, function ($mock) {
            $mock->shouldReceive('loadAccount')
                ->once()
                ->andReturn(new \Objective\Transaction\Domain\Account(1, 1, 100));
        });

        $this->mock(\Objective\Transaction\Domain\AtomicityExecution::class, function ($mock) {
            $mock->shouldReceive('execute')
                ->once();
        });

        $data = [
            'numero_conta' => '1',
            'valor' => 100,
            'forma_pagamento' => 'P'
        ];

        $this->postJson('/transacao', $data)
            ->assertJsonStructure(['numero_conta', 'saldo'])
            ->assertStatus(201);
    }

    public function test_payment_fail_insuficient_founds()
    {
        $this->mock(\Objective\Transaction\Domain\AccountRepository::class, function ($mock) {
            $mock->shouldReceive('loadAccount')
                ->once()
                ->andReturn(new \Objective\Transaction\Domain\Account(1, 1, 100));
        });

        $data = [
            'numero_conta' => '1',
            'valor' => 101,
            'forma_pagamento' => 'P'
        ];

        $this->postJson('/transacao', $data)
            ->assertJsonStructure(['error'])
            ->assertStatus(404);
    }
}
