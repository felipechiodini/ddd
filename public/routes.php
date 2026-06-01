<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/', \App\Store\Interface\CreateStoreController::class);