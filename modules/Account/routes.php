<?php

use Illuminate\Support\Facades\Route;

Route::get('conta', [Objective\Account\Controller::class, 'load'])
    ->name('account.get');

Route::post('conta', [Objective\Account\Controller::class, 'create'])
    ->name('account');
