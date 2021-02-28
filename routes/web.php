<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/', [IndexController::class, 'index'])
        ->name('admin');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('sources', SourceController::class);
});


/**
 * Группировка роутов для упрощения написания url и name
 */
Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
    Route::get('/category', [NewsController::class, 'index'])
        ->name('index');;
    Route::get('/category/{category_id}', [NewsController::class, 'showCategory'])
        ->name('category');
    Route::get('/category/posts/{id}', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('show');
});


Route::get('/', [WelcomeController::class, 'index'])
        ->name('welcome');

Route::get('/about', [AboutUsController::class, 'index'])
    ->name('about');
