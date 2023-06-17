<?php

use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\CMS\ClientController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\SocialController;
use App\Http\Controllers\Site\StaticPagesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('site.index');

Route::controller(CategoryController::class)->prefix('category')->name('site.')->group(function () {
    Route::get('/', 'index')->name('allCategory');
    Route::get('show-product-category/{id}', 'showProductCategory')->name('showProductCategory');
    Route::get('show-product-sub-category/{id}', 'showProductSubCategory')->name('showProductSubCategory');
    Route::get('show-sub-category/{id}', 'showSubCategory')->name('showSubCategory');
    Route::get('product-details/{id}', 'productDetails')->name('showProduct');
    Route::post('product-details/{id}', 'productDetailsStore')->name('showProduct.store')->middleware('auth');
    Route::get('show-product-main-category/{id}', 'showProductMainCategory')->name('showProductMainCategory');
    Route::get('get-all-detail', 'getAllDetail')->name('getAllDetail');

});
Route::controller(CartController::class)->prefix('cart')->name('site.cart.')->group(function () {
    Route::post('/add', 'add')->name('add');
    Route::get('/show-cart', 'showCart')->name('show');
    Route::post('/update-count-cart', 'updateCount')->name('updateCount');
    Route::post('/set-discount-cart', 'setDiscount')->name('setDiscount');
    Route::post('/delete-product', 'deleteProduct')->name('deleteProduct');

});
Route::controller(ProductController::class)->prefix('product')->name('site.product.')->group(function () {
    Route::get('/offer', 'offerProduct')->name('offerProduct');
    Route::get('/favProduct', 'favProduct')->name('favProduct');
    Route::get('/featured', 'featuredProduct')->name('featuredProduct');
    Route::get('/best-seller', 'bestSellerProduct')->name('bestSellerProduct');
    Route::get('/best-seller-this-week', 'bestSellerThisWeek')->name('bestSellerThisWeek');
    Route::get('/visitor-see', 'visitorSee')->name('visitorSee');
    Route::post('/searchProduct', 'searchProduct')->name('searchProduct');


});
Route::controller(OrderController::class)->prefix('order')->name('site.order.')->group(function () {
    Route::post('/create-order', 'createOrder')->name('createOrder');
    Route::post('/complete-create-order', 'completeCreateOrder')->name('completeCreateOrder');
    Route::get('/order-history', 'orderHistory')->name('orderHistory');
    Route::post('/delete-order', 'deleteOrder')->name('deleteOrder');





});
Route::controller(StaticPagesController::class)->prefix('static-page')->name('site.staticPage')->group(function () {
    Route::get('/{id}', 'index');





});

Route::get('/getRegister', [ClientController::class, 'getRegister'])->name('client.getRegister');
Route::post('/postRegister', [ClientController::class, 'postRegister'])->name('client.register');



Route::get('/contactUs', [ContactUsController::class, 'index'])->name('contactUs');
Route::post('/contactUs', [ContactUsController::class, 'postcontactUs'])->name('contact.store');


Route::get('/fav_product', [ProductController::class, 'syncFavorite'])->name('fav.sync');

Route::get('/profile', [ProfileController::class, 'profilePage'])->name('profile');
Route::post('/profile', [ProfileController::class, 'profilePagePost'])->name('profile.edit');
Route::get('/notification', [ProfileController::class, 'notification'])->name('profile.notification');
Route::post('/edit-notification', [ProfileController::class, 'editNotification'])->name('profile.editNotification');
Route::get('/optimize' ,function (){
Artisan::call('config:clear');
Artisan::call('cache:clear');
Artisan::call('optimize:clear');
    return "clear";
});


//Route::get('auth/google', [SocialController::class, 'redirect'])->name('google-auth');
//Route::get('auth/google/call-back', [SocialController::class, 'callbackGoogle']);
//
