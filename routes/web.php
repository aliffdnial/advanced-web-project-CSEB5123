<?php

use App\Http\Controllers\UserController;
use App\Models\BusinessUnit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BusinessUnitController;

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
});

Auth::routes();

Route::group(['prefix' => '/app', 'as' => 'app.', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class,"dashboard"])->name('dashboard');
    Route::resource('bu', BusinessUnitController::class);
    Route::resource('profile', UserController::class);
    
    
    
    Route::group(['prefix' => '/itms', 'as' => 'itms.', 'middleware' => ['checkAdmin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\ITMS\DashboardController::class,"dashboard"])->name('dashboard');
    });
});