<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Side Controller
use App\Http\Controllers\Admin\MiscController as AdminMiscController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;

// User Controller
use App\Http\Controllers\Admin\UserController;

// Guest Controller
use App\Http\Controllers\Guest\MiscController as GuestMiscController;


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

// User Controller
Route::resource('user', UserController::class, []);
Auth::routes();

// Route::get('/admin', [MiscController::class, 'index'])->name('admin');
Route::group([
    'prefix' => 'admin',
    'name' => 'admin.'
], function () {
    // Index Dashboard
    Route::get('/', [AdminMiscController::class, 'index'])->name('admin.index');
    // Articles Dashboard
    Route::resource('articles', AdminArticleController::class);
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
