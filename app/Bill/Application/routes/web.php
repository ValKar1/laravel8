<?php

use Illuminate\Support\Facades\Route;
use App\Bill\Infrastructure\Controllers\BillController;
use App\Bill\Infrastructure\Controllers\ClientController;

Route::post('client/address', [ClientController::class, 'changeAddress']);

Route::post('bill', [BillController::class, 'create']);
