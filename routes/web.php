<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Side Controller
use App\Http\Controllers\Admin\MiscController as AdminMiscController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

// User Controller
use App\Http\Controllers\Admin\UserController;

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

// User Controller
Route::resource('user', UserController::class, []);
Auth::routes();

// Route::get('/admin', [MiscController::class, 'index'])->name('admin');
Route::group([
    'prefix' => 'admin',
    'name' => 'admin.'
], function () {
    // Index Dashboard
    Route::get('/', [AdminMiscController::class, 'index'])->name('index');
    // Articles Dashboard
    Route::resource('articles', AdminArticleController::class);
});
