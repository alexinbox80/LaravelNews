<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use \App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

//Route::get('/', function () {
//    return view('index');
//});

//include __DIR__ . '/admin.php';
//RouteServiceProvider.php ....

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

//news routes
Route::get('/about', [AboutController::class, 'index'])
    ->name('news.about');

Route::get('/', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/categories', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/category/{id}', [NewsController::class, 'showCategory'])
    ->name('news.showCategory');

Route::get('/news/{id}', [NewsController::class, 'showNews'])
    ->where('id', '\d+')
    ->name('news.showNews');
