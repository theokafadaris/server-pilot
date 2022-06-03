<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CloudProviderController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'] )->name('dashboard');
    Route::prefix('account')->group(function () {
        Route::get('/authentication',[AccountController::class, 'authentication'] )->name('authentication');
        Route::get('/ssh-keys',[AccountController::class, 'sshKeys'] )->name('ssh-keys');
    });
    
    

    Route::get('/cloud_providers',[CloudProviderController::class, 'index'] )->name('cloud_providers');
});

require __DIR__.'/auth.php';
