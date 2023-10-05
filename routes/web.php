<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Web\DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('users', [\App\Http\Controllers\Web\UserController::class, 'index'])->name('users.index');

    Route::resource('companies', \App\Http\Controllers\Web\CompanyController::class);
    Route::resource('clients', \App\Http\Controllers\Web\ClientController::class);

    Route::put('/users/{user}/admin', [\App\Http\Controllers\Web\UserController::class, 'makeAdmin'])->name('make.admin');
    Route::put('/users/{user}/user', [\App\Http\Controllers\Web\UserController::class, 'makeUser'])->name('make.user');

    Route::get('profile', [\App\Http\Controllers\Web\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\Web\ProfileController::class, 'update'])->name('profile.update');
});
