<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\front\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', [UserController::class, 'showBlogs']);
        Route::get('file', [UserController::class, 'AkramData']);
        Route::get('store', [UserController::class, 'InsertData']);
        Route::get('create', [UserController::class, 'create']);
        Route::post('save', [UserController::class, 'save'])->name("blog.save");
        Route::get('edit/{id}', [UserController::class, 'editBlog']);
        Route::post('edit', [UserController::class, 'saveEditPost']);
        Route::get('del/{id}', [UserController::class, 'DeletePost']);
    });
});
