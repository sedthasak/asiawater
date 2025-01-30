<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BackendPageController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendPageController;
use App\Http\Controllers\Frontend\LianlianController;
use App\Http\Controllers\Frontend\LanguageController;

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



Route::middleware('store.auth')->group(function() {
    

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    

    Route::get('detailwater-ro', [FrontendPageController::class, 'detailwaterro']);
    Route::get('detailwater-alkaline', [FrontendPageController::class, 'detailwateralkaline']);
    Route::get('detailwater-oxygen', [FrontendPageController::class, 'detailwateroxygen']);
    Route::get('detailwater-ro', [FrontendPageController::class, 'detailwaterro']);
    Route::get('select-payment', [FrontendPageController::class, 'selectpayment']);
    Route::get('push', [FrontendPageController::class, 'push']);
    Route::get('qr-code', [FrontendPageController::class, 'qrcode']);
    Route::get('thank', [FrontendPageController::class, 'thank']);
    Route::get('chillpay-test', [FrontendPageController::class, 'chillpaytest']);
    Route::post('quantity', [FrontendPageController::class, 'quantity']);
    Route::post('/update-total', [FrontendPageController::class, 'updateTotal'])->name('updateTotal');
    Route::get('lianliantest', [LianlianController::class, 'lianliantest'])->name('lianliantest');
    Route::get('/payment/process', [LianlianController::class, 'processPayment'])->name('payment.process');
    Route::get('/lianlianqr', [LianlianController::class, 'lianlianqr'])->name('lianlianqr');
    Route::get('set-language/{locale}', [LanguageController::class, 'setLanguage']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('frontend.index');
    // return redirect('/dashboard');
});
Route::get('login-system', [AuthController::class, 'backendLogin'])->name('backendLogin');
Route::post('frontend-login-submit', [LoginController::class, 'authenticate'])->name('frontendloginsubmit');
// Route::get('/set-cookie', [LianlianController::class, 'setCookieExample']);
Route::get('/set-cookie', function () {
    return 'Cookie has been set';
})->middleware('set.cookie');

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');        

    Route::prefix('backend')->group(function () {

        Route::get('/dashboard', [BackendPageController::class, 'index'])->name('dashboard');
        Route::post('/dashboard/filter', [BackendPageController::class, 'filter'])->name('dashboard.filter');
        Route::post('/dashboard/export', [BackendPageController::class, 'export'])->name('dashboard.export');
        Route::get('/', [BackendPageController::class, 'backendDashboard'])->name('backendDashboard');

        Route::prefix('users')->group(function () {

            Route::get('', [UsersController::class, 'BN_users'])->name('BN_users');
            Route::get('add', [UsersController::class, 'BN_users_add'])->name('BN_users_add');
            Route::post('add-action', [UsersController::class, 'BN_users_add_action'])->name('BN_users_add_action');
            Route::get('edit/{id}', [UsersController::class, 'BN_users_edit'])->name('BN_users_edit');
            Route::post('edit-action', [UsersController::class, 'BN_users_edit_action'])->name('BN_users_edit_action');

        });

        Route::prefix('stores')->group(function () {

            Route::get('', [UsersController::class, 'BN_stores'])->name('BN_stores');
            Route::get('add', [UsersController::class, 'BN_stores_add'])->name('BN_stores_add');
            Route::post('add-action', [UsersController::class, 'BN_stores_add_action'])->name('BN_stores_add_action');
            Route::get('edit/{id}', [UsersController::class, 'BN_stores_edit'])->name('BN_stores_edit');
            Route::get('delete/{id}', [UsersController::class, 'BN_stores_delete'])->name('BN_stores_delete');
            // Route::post('edit-action', [UsersController::class, 'BN_stores_edit_action'])->name('BN_stores_edit_action');
            Route::post('edit/{id}/edit-action', [UsersController::class, 'BN_stores_edit_action'])->name('BN_stores_edit_action');
        });
        Route::prefix('settings')->group(function () {
            Route::get('', [BackendPageController::class, 'BN_settings'])->name('BN_settings');
         });

    });

});

require __DIR__.'/auth.php';
