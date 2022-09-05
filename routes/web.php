<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Account\IndexController as AccountController;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;


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

Route::middleware('auth')->group(function() {
    Route::get('/account', AccountController::class)
        ->name('account');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function() {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('feedback', AdminFeedbackController::class);
        Route::resource('order', AdminOrderController::class);
        Route::resource('profiles', AdminProfileController::class);
    });
});

//news routes
Route::get('/', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/categories', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/category/{id}', [NewsController::class, 'showCategory'])
    ->name('news.showCategory');

Route::get('/news/{id}', [NewsController::class, 'showNews'])
    ->where('id', '\d+')
    ->name('news.showNews');

Route::resource('feedback', FeedbackController::class);
Route::resource('order', OrderController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
