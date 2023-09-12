<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordPhoneNumberController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\SoialLoginController;
use App\Http\Controllers\Front\FrontHomeController;
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

//Auth route

Route::get('/home', [HomeController::class, 'index'])->name('homeRegister');
Route::get('/', [FrontHomeController::class, 'index'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'loginForm')->name('login.form');
    Route::post('login', 'login')->name('login');
    Route::get('register', 'registerForm')->name('register.form');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout');
  });

  
  Route::controller(ForgotPasswordController::class)->group(function () {
      Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
      Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post');
      Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
      Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
  });

  /*
  Route::controller(ForgetPasswordPhoneNumberController::class)->group(function () {
    Route::get('forget-password', 'index')->name('mobile.forget.password.get');
    Route::post('forget-password', 'store')->name('mobile.forget.password.post');
    Route::get('reset-password/{code}', 'showResetPasswordForm')->name('mobile.reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('mobile.reset.password.post');
    Route::any('reset-password', 'resetPasswordForm')->name('mobile.resetPasswordForm');
});
*/


Route::get('auth/{provider}/redirect', [SoialLoginController::class, 'redirect'])
    ->name('auth.socilaite.redirect');
Route::get('auth/{provider}/callback', [SoialLoginController::class, 'callback'])
    ->name('auth.socilaite.callback');


require __DIR__ . '/dashboard.php';
require __DIR__ . '/front.php';
