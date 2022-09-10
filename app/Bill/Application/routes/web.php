<?php

use Illuminate\Support\Facades\Route;
use App\Bill\Infrastructure\Controllers\BillController;
use App\Bill\Infrastructure\Controllers\ClientController;

Route::get('client/address/{client_id}', [ClientController::class, 'getAddressAction']);
Route::post('client/address', [ClientController::class, 'changeAddressAction']);

Route::get('bill/{bill_id}', [BillController::class, 'getBillAction']);
Route::post('bill', [BillController::class, 'createBillAction']);
