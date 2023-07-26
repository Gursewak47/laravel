<?php

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('users', UserController::class)->only(['index','store','show','update','destory']);

Route::apiResource('employees', EmployeeController::class)->only(['index','store','show','update','destory']);

Route::apiResource('sales_orders', SalesOrderController::class)->only(['index','store','show','update','destory']);
