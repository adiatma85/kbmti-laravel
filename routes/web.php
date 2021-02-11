<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Side Controller
use App\Http\Controllers\Admin\MiscController as AdminMiscController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Guest Side Controller
use App\Http\Controllers\Guest\MiscController as GuestMiscController;

// User Controller

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




// Auth Routes
Auth::routes();

// Admin Side Group Route
Route::group([
    'prefix' => 'admin',
    'name' => 'admin.',
    'middleware' => ['isGeneralAdmin', 'auth']
], function () {
    // Index Dashboard
    Route::get('/', [AdminMiscController::class, 'index'])->name('admin.index');
    // Articles Resource Controller
    Route::resource('articles', AdminArticleController::class);
    // Users Resource Controller
    Route::resource('users', AdminUserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'destroy' => 'admin.users.destroy',
        'update' => 'admin.users.update',
        'show' => 'admin.users.show',
        'edit' => 'admin.users.edit'
        ]);
});

// Guest Side Group Route
Route::group([
    'name' => 'guest.',
    'prefix' => 'guest'
], function () {
    // Landing Page
    Route::get('/', [GuestMiscController::class, 'index'])->name('guest.index');
});
