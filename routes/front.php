<?php

use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ChatController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CountactUsController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\StoreController;
use App\Http\Controllers\Front\ReviewController;
use App\Http\Controllers\Front\TraderController;
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

Route::group(['prefix'=>'/','middleware'=>['auth','web','checkusertype:salesman']],function(){

});

Route::get('product/{product:slug}/show',[StoreController::class,'showProduct'])->name('front.showProduct');
Route::get('stores',[StoreController::class,'index'])->name('front.store.index');
Route::get('stores/{store:slug}/show',[StoreController::class,'show'])->name('front.store.show');

Route::get('traders',[TraderController::class,'index'])->name('front.trader.index');
Route::get('trader/{id}/trader',[TraderController::class,'show'])->name('front.trader.show');

Route::post('review',[ReviewController::class,'index'])->name('front.review.index');
Route::post('review/store',[ReviewController::class,'store'])->name('front.review.store');

Route::resource('cart',CartController::class)->names('front.cart');

Route::get('checkout',[CheckoutController::class,'index'])->name('front.checkout.index');
Route::post('checkout/store',[CheckoutController::class,'store'])->name('front.checkout.store');

Route::get('chat',[ChatController::class,'index'])->name('front.chat.index');
Route::post('chat/store',[ChatController::class,'store'])->name('front.chat.store');
Route::delete('chat/{id}/delete',[ChatController::class,'destroy'])->name('front.chat.destroy');

Route::get('order',[TraderController::class,'order'])->name('admin.trader.order');

Route::post('contact-us/store',[CountactUsController::class,'store'])->name('front.conactUs.store');
Route::get('contact-us',[CountactUsController::class,'index'])->name('front.conactUs.index');


