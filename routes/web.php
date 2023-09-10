<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\WitdrawRequestController;
use App\Http\Controllers\WithdrawController;

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

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('plans', PlanController::class);
    Route::resource('paymentmethods', PaymentMethodController::class);
    Route::get('contact-us', [ContactController::class, 'index'])->name('contact.list');
    Route::delete('delete-contact/{contact}', [ContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('package', [PaymentController::class, 'index'])->name('package');
    Route::get('payment-form/{id}', [PaymentController::class, 'create'])->name('package.create');
    Route::post('payment-form', [PaymentController::class, 'store'])->name('package.store');
    Route::get('payment-list', [PaymentController::class, 'show'])->name('payment.list');
    Route::delete('payment-delete/{id}', [PaymentController::class, 'destroy'])->name('payment.delete');
    Route::get('payment-approved/{id}', [PaymentController::class, 'approved'])->name('payment.approved');

    Route::get('withdraw-form', [WithdrawController::class, 'create'])->name('withdraw.form');
    Route::post('withdraw-form', [WithdrawController::class, 'store'])->name('withdraw.form.save');
    Route::get('withdraw-list', [WithdrawController::class, 'index'])->name('withdraw.list');
    Route::delete('withdraw-delete/{withdraw}', [WithdrawController::class, 'destroy'])->name('withdraw.delete');

    //add user cash
    Route::get('user-lists', [UserController::class, 'user_cash_list'])->name('user.cash.list');
    Route::get('user-cash-form/{user}', [UserController::class, 'user_cash_form'])->name('user.cash.form');
    Route::post('user-cash-form/{user}', [UserController::class, 'user_cash_save'])->name('user.cash.save');
    Route::delete('user-list-delete/{id}', [UserController::class, 'user_list_delete'])->name('user.list.delete');

    //edit profile
    Route::get('profile-edit', [UserController::class, 'user_edit'])->name('user.edit');
    Route::post('profile-update', [UserController::class, 'user_update'])->name('user.update');

    //withdraw request
    Route::post('withdraw-request', [WitdrawRequestController::class, 'store'])->name('withdraw.save');

    Route::get('withdraw-request-list', [WitdrawRequestController::class, 'index'])->name('withdraw.request.list');
    Route::delete('withdraw-request-delete/{id}', [WitdrawRequestController::class, 'destroy'])->name('withdraw.request.delete');
    Route::get('withdraw-request-approved/{id}', [WitdrawRequestController::class, 'approved'])->name('withdraw.request.approved');

    // message
    Route::get('messages', [MessageController::class, 'index'])->name('messages');
    Route::delete('messages-delete/{id}', [MessageController::class, 'destroy'])->name('messages.delete');



    




    


});

Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');
// Route::get('check', [PaymentController::class, 'index'])->name('test');




