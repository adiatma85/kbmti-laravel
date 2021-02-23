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


// Temporary Staff Ahli
use App\Http\Controllers\stafAhli as StaffAhliController;
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

// Landing Page ketika membuka pertama kali
Route::get('/', function () {
    // return view('welcome');
    return view('general.index-landing-page');
    // Route::get('/', [GuestMiscController::class, 'landingPage'])->name('guest.landing.page');
})->name('guest.landing.page');

// Staf Ahli Temporary
Route::resource('staf_Ahli', StaffAhliController::class, []);




// Auth Routes
Auth::routes();

// Admin Side Group Route
Route::group([
    'prefix' => 'admin',
    'name' => 'admin.',
    'middleware' => ['auth', 'isGeneralAdmin']
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
Route::name('guest.')
    ->prefix('guest')
    ->group(function () {
        // Landing Page
        Route::get('/', [GuestMiscController::class, 'index'])->name('guest.index');
    });

// Route::group
// Route::group([
//     'prefix' => 'guest',
//     'name' => 'guest'
// ], function () {
//     // Landing Page
//     Route::get('/', [GuestMiscController::class, 'landingPage'])->name('guest.landing.page');
// });

Route::name('pengumuman.')
    ->prefix('pengumuman')
    ->group(function () {
        Route::get('/staf-ahli', [StaffAhliController::class, 'showPengumumanForm'])->name('stafAhliForm');
        Route::post('/staf-ahli', [StaffAhliController::class, 'postPengumumanForm'])->name('postPengumumanForm');
    });
