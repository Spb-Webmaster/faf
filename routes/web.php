<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Catalog\CategoryController;
use App\Http\Controllers\Catalog\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\PageController;
use App\MoonShine\Controllers\MoonshineIndexController;
use App\MoonShine\Controllers\MoonshineSettingController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'contacts')->name('contacts');
});


Route::post('/moonshine/setting', MoonshineSettingController::class);
Route::post('/moonshine/index', MoonshineIndexController::class);



/**
 * Каталог
 */

Route::controller(CategoryController::class)->group(function () {
    Route::get('/catalog', 'catalog')->name('catalog');
    Route::get('/catalog/{category}', 'category')->name('category');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/catalog/{category}/{product}', 'product')->name('product');
});



Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');
    Route::post('/send-mail/reserve', 'Reserve');

});

/**
 * Страницы
 */

Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
