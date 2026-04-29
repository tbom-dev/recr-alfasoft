<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
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

Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
Route::get('/logout', [AuthController::class, 'logout'])->name('login.logout');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('contacts')->group(function(){
        Route::get('/create', [ContactController::class, 'create'])->name('contact.create');
        Route::post('/', [ContactController::class, 'store'])->name('contact.store');
        Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('contact.edit');
        Route::put('/{contact}', [ContactController::class, 'update'])->name('contact.update');
        Route::get('/{contact}', [ContactController::class, 'show'])->name('contact.show');
        Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    });

});
