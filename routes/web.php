<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

    if (Auth::check()) {
        return redirect()->route('operations.index');
    } else {
        return redirect()->route('landing');
    }
});

Route::get('home/landing.html', [LandingController::class, 'index'])->name('landing');

Route::prefix('users')->group(function () {
    Route::post('register', [UserController::class, 'register'])->name('users.register');
    Route::post('connect', [UserController::class, 'connect'])->name('users.connect');
    Route::get('logout', [UserController::class, 'logout'])->name('users.logout');
});

Route::prefix('operations')->group(function () {
    Route::get('/', [OperationController::class, 'index'])->name('operations.index');
    Route::get('transactions/{id?}/get', [OperationController::class, 'show'])->name('operations.show');
    Route::post('transactions/update', [OperationController::class, 'update'])->name('operations.update');
    Route::post('transactions/authorization/update', [OperationController::class, 'authorization'])->name('operations.authorization');
    Route::post('transactions/validation/update', [OperationController::class, 'validation'])->name('operations.validation');


});






Route::prefix('users')->group(function () {
    
    /* 
        Route::get('index', [ProjetsController::class, 'index'])->name('projets.index');
        Route::get('create', [ProjetsController::class, 'create'])->name('projets.create');

        Route::post('store', [ProjetsController::class, 'store'])->name('projets.store');
        Route::get('edit', [ProjetsController::class, 'edit'])->name('projets.edit');
        Route::post('update', [ProjetsController::class, 'update'])->name('projets.update');

        Route::get('get/{id?}', [ProjetsController::class, 'getArticleById'])->name('projets.getById');
        Route::get('get/json/{id?}', [ProjetsController::class, 'getArticleByIdJson'])->name('projets.getByIdJson'); 
    */

});
