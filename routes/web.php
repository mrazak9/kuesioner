<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\User\TransactoinController as UserTransaction;
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
    return view('welcome');
})->name('home');

Route::get('login', function () {
    return view('login');
})->name('login');

// Socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google/callback',[UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// Route::middleware(['auth'])->group(function(){
    
    Route::get('transaction/success',[UserTransaction::class, 'success'])->name('transaction.success');
    Route::get('transaction/ppa',[UserTransaction::class, 'createPpa'])->name('transaction.create.ppa');
    Route::get('transaction/pmm',[UserTransaction::class, 'createPmm'])->name('transaction.create.pmm');
    Route::get('transaction/ppg',[UserTransaction::class, 'createPpg'])->name('transaction.create.ppg');
    Route::post('transaction/ppg',[UserTransaction::class, 'ppgStore'])->name('transaction.store.ppg');
    Route::post('transaction/ppa',[UserTransaction::class, 'ppaStore'])->name('transaction.store.ppa');
    Route::post('transaction/pmm',[UserTransaction::class, 'pmmStore'])->name('transaction.store.pmm');
// });

Route::get('notlogin', function () {
    return view('notlogin');
})->name('notlogin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
