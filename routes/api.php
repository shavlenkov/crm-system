<?php

use App\Http\Controllers\Api\Auth\AuthController;
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

Route::prefix('auth')->group(function() {
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/companies', [App\Http\Controllers\Api\CompanyController::class, 'getCompanies']);
    Route::get('/clients/company/{company}', [App\Http\Controllers\Api\ClientController::class, 'getClientsByCompany']);
    Route::get('/companies/client/{client}', [App\Http\Controllers\Api\CompanyController::class, 'getCompaniesByClient']);
});
