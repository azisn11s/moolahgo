<?php

use App\Http\Controllers\IncomingTransactionController;
use App\Http\Controllers\RemitTransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Remit Transaction
Route::post('remit-transactions', [RemitTransactionController::class, 'store']);
Route::get('remit-transactions/{remitTransaction}', [RemitTransactionController::class, 'store']);

// Incoming Transaction
Route::post('incoming-transactions', [IncomingTransactionController::class, 'store']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
