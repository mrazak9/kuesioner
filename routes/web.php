<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TransactoinController as UserTransaction;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProspectController;

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
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// PPA Route
Route::get('transaction/success', [UserTransaction::class, 'success'])->name('transaction.success');
Route::get('transaction/ppa', [UserTransaction::class, 'createPpa'])->name('transaction.create.ppa');
Route::post('transaction/ppa', [UserTransaction::class, 'ppaStore'])->name('transaction.store.ppa');
Route::get('transaction/pmm_guest', [UserTransaction::class, 'createPmm'])->name('transaction.create.pmm_guest');
Route::post('transaction/pmm_guest', [UserTransaction::class, 'pmmStore_guest'])->name('transaction.store.pmm_guest');
Route::get('transaction/ppg_guest', [UserTransaction::class, 'createppg'])->name('transaction.create.ppg_guest');
Route::post('transaction/ppg_guest', [UserTransaction::class, 'ppgStore_guest'])->name('transaction.store.ppg_guest');

Route::middleware(['auth'])->group(function () {
    // Transaction route
    // Route::get('transaction/success',[UserTransaction::class, 'success'])->name('transaction.success');
    Route::get('transaction/ppa_user', [UserTransaction::class, 'createPpa'])->name('transaction.create.ppa_user')->middleware('ensureUserRole:alumni');
    Route::post('transaction/ppa_user', [UserTransaction::class, 'ppaStoreUser'])->name('transaction.store.ppa_user')->middleware('ensureUserRole:alumni');
    Route::get('transaction/pmm', [UserTransaction::class, 'createPmm'])->name('transaction.create.pmm')->middleware('ensureUserRole:student');
    Route::post('transaction/pmm', [UserTransaction::class, 'pmmStore'])->name('transaction.store.pmm')->middleware('ensureUserRole:student');
    Route::get('transaction/ppg', [UserTransaction::class, 'createPpg'])->name('transaction.create.ppg')->middleware('ensureUserRole:teacher');
    Route::post('transaction/ppg', [UserTransaction::class, 'ppgStore'])->name('transaction.store.ppg')->middleware('ensureUserRole:teacher');

    // remove
    Route::get('transaction/remove/{prospect_id}', [UserTransaction::class, 'destroy'])->name('transaction.remove')->middleware('ensureUserRole:admin');

    // add users
    Route::get('user/create', [UserController::class, 'create'])->name('user.create')->middleware('ensureUserRole:admin');
    Route::post('user/create', [UserController::class, 'store'])->name('user.store')->middleware('ensureUserRole:admin');

    // Dashboard route
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('admin/view_user', [AdminDashboard::class, 'view'])->name('view_user')->middleware('ensureUserRole:admin');
    Route::get('admin/update_prospect/{transId}', [UserTransaction::class, 'show'])->name('transaction.show')->middleware('ensureUserRole:admin');
    Route::post('admin/update_prospect/{transId}', [UserTransaction::class, 'edit'])->name('transaction.edit')->middleware('ensureUserRole:admin');

    // User Dashboard
    Route::prefix('user/')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function () {
        Route::get('dashboard/', [UserDashboard::class, 'index'])->name('dashboard');
        Route::get('dashboard_dosen', [UserDashboard::class, 'index'])->name('dashboard_dosen');
    });

    // Admin dashboard
    Route::prefix('pages/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::get('showProgress', [AdminController::class, 'showProgress'])->name('dashboard.progress');
        Route::get('prospect/cekRegistrant/{transId}', [AdminController::class, 'cekRegistrant'])->name('dashboard.cekRegistrant');
        Route::get('syncAll', [AdminController::class, 'syncAll'])->name('dashboard.syncAll');

        // // Profile
        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::get('profile/{userId}', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('profile/{userId}', [ProfileController::class, 'edit'])->name('profile.edit');

        //Prospect
        Route::get('prospect', [ProspectController::class, 'index'])->name('prospect');
        Route::get('prospect/listPmm', [ProspectController::class, 'listPmm'])->name('prospect.pmm');
        Route::get('prospect/listPpg', [ProspectController::class, 'listPpg'])->name('prospect.ppg');
        Route::get('prospect/listPpa', [ProspectController::class, 'listPpa'])->name('prospect.ppa');
        Route::get('prospect/detail/{transId}', [ProspectController::class, 'detail'])->name('prospect.detail');
        Route::get('prospect/edit/{transId}', [ProspectController::class, 'show'])->name('prospect.show');
        Route::post('prospect/edit/{userId}', [ProspectController::class, 'edit'])->name('prospect.edit');
        Route::get('prospect/delete/{userId}', [ProspectController::class, 'destroy'])->name('prospect.delete');
        Route::get('prospect/cari', [ProspectController::class, 'cari'])->name('prospect.cari');
    });
});

Route::get('notlogin', function () {
    return view('notlogin');
})->name('notlogin');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
