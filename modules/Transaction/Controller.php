<?php

namespace Objective\Transaction;

use Objective\Transaction\Exceptions\InsuficientFounds;
use Objective\Transaction\UseCases\Withdrawal\Input;

class Controller
{
    public function __invoke(
        \Illuminate\Http\Request $request,
        \Objective\Transaction\UseCases\Withdrawal\UseCase $useCase
    ) {
        try {
            $input = new Input(
                $request->input('numero_conta'),
                $request->input('valor'),
                $request->input('forma_pagamento')
            );

            $output = $useCase->execute($input);

            return response()->json([
                'numero_conta' => $output->accountNumber,
                'saldo' => $output->balance
            ], 201);
        }
        catch (InsuficientFounds $exeception) {
            return response()->json([
                'error' => $exeception->getMessage()
            ], 404);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exeception) {
            return response()->json([
                'error' => $exeception->getMessage()
            ], 400);
        } catch (\Exception $exeception) {
            return response()->json([
                'error' => 'Erro inesperado'
            ], 500);
        }
    }
}
