<?php

use App\Http\Controllers\Admin\CategoriesController ;
use App\Http\Controllers\Admin\ChartJSController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\Auth\RoleUserController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'dashboard','middleware'=>['auth','web','checkusertype:trader,admin']],function(){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');

    Route::get('settings', [ConfigController::class, 'create'])->name('settings');
    Route::post('settings', [ConfigController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('user',UserController::class)->names('user')->except('show');
    Route::get('user/showTrader', [UserController::class, 'showTrader'])->name('user.showTrader');
    Route::get('user/showSalesman', [UserController::class, 'showSalesman'])->name('user.showSalesman');

    Route::resource('category',CategoriesController::class)->names('category');
    Route::resource('product',ProductController::class)->names('product');
    Route::resource('store',StoreController::class)->names('store');

    Route::resource('/roleuser', RoleUserController::class)->names('roleuser');
    Route::resource('/role', RoleController::class)->names('role');

    Route::resource('trader/product',FrontProductController::class)->names('trader.product')->except('show');

    Route::get('order', [OrderController::class, 'index'])->name('admin.order.index');


});
Route::get('chart-js', [ChartJSController::class, 'index']);
//Route::get('chart', [ChartJSController::class, 'index']);
