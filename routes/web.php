<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\WelcomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!b
|
*/

Route::get('/', [WelcomeController::class, 'index'])
    ->name('welcome');

/**
 * Группировка роутов для упрощения написания url и name
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['middleware' => 'admin'], function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/', [IndexController::class, 'index'])
                ->name('admin');
            Route::resource('news', AdminNewsController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('sources', SourceController::class);
            Route::resource('users', UserController::class);
        });
    });
});
Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
    Route::get('/category', [NewsController::class, 'index'])
        ->name('index');;
    Route::get('/category/{category_id}', [NewsController::class, 'showCategory'])
        ->name('category');
    Route::get('/category/posts/{id}', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('show');
});




Route::get('/example/{category}', fn(Category $category) => $category);


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/parse/news', \App\Http\Controllers\ParserController::class);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/vk/init', [SocialiteController::class, 'init'])->name('vk.init');
    Route::get('/auth/vk/callback', [SocialiteController::class, 'callback'])->name('vk.callback');
});
