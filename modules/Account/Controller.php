<?php

namespace Objective\Account;

use Illuminate\Http\Request;

class Controller
{
    public function load(Request $request, \Objective\Account\UseCases\LoadAccount\UseCase $useCase)
    {
        try {
            $input = new \Objective\Account\UseCases\LoadAccount\Input(
                $request->input('numero_conta')
            );

            $output = $useCase->execute($input);

            return response()->json([
                'numero_conta' => $input->accountNumber,
                'saldo' => $output->balance
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response()->json([
                'message' => 'Conta não encontrada'
            ], 404);
        } catch (\Exception $th) {
            return response()->json([
                'message' => 'Erro inesperado'
            ], 500);
        }
    }

    public function create(\Illuminate\Http\Request $request, \Objective\Account\UseCases\CreateAccount\UseCase $useCase)
    {
        try {
            $input = new \Objective\Account\UseCases\CreateAccount\Input(
                $request->input('numero_conta'),
                $request->input('saldo')
            );

            $account = $useCase->execute($input);

            return response()->json([
                'numero_conta' => $account->number,
                'saldo' => $account->balance
            ], 201);
        } catch (\Objective\Account\Exceptions\AccountNumberAlreadyExists $th) {
            return response()->json([
                'message' => 'Já existe uma conta com esse numero'
            ], 400);
        }
    }
}
