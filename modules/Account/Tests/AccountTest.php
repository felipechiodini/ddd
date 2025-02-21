<?php

namespace Objective\Account\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use WithFaker;

    public function test_get_account()
    {
        $accountNumber = $this->faker->randomNumber();
        $balance = $this->faker->randomFloat(2, 0, 1000);

        $this->mock(\Objective\Account\Domain\AccountRepository::class, function (MockInterface $mock) use ($accountNumber, $balance) {
            $mock->shouldReceive('loadAccount')
                ->with($accountNumber)
                ->once()
                ->andReturn(new \Objective\Account\Domain\Account(
                    $accountNumber,
                    $balance
                ));
        });

        $this->json('GET', '/conta', ['numero_conta' => $accountNumber])
            ->assertJson([
                'numero_conta' => $accountNumber,
                'saldo' => $balance
            ])
            ->assertStatus(200);
    }

    public function test_create_account()
    {
        $accountNumber = $this->faker->randomNumber();
        $balance = $this->faker->randomFloat(2, 0, 1000);

        $this->mock(\Objective\Account\Domain\AccountRepository::class, function (MockInterface $mock) use ($accountNumber) {
            $mock->shouldReceive('checkAccountNumberExists')
                ->once()
                ->with($accountNumber)
                ->andReturn(false);

            $mock->shouldReceive('store')
                ->once();
        });

        $data = [
            'numero_conta' => $accountNumber,
            'saldo' => $balance
        ];

        $this->postJson('/conta', $data)
            ->assertJson([
                'numero_conta' => $accountNumber,
                'saldo' => $balance
            ])
            ->assertStatus(201);
    }
}
