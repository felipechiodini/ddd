<?php

use Illuminate\Support\Facades\Route;

Route::post('transacao', Objective\Transaction\Controller::class)
    ->name('transaction');
