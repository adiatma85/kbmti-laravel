<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Side Controller
use App\Http\Controllers\Admin\MiscController as AdminMiscController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// Temporary Staff Ahli Controller
use App\Http\Controllers\admin\stafAhli as AdminStaffAhliController;

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
    return view('welcome');
    // return view('general.index-landing-page');
    // Route::get('/', [GuestMiscController::class, 'landingPage'])->name('guest.landing.page');
})->name('guest.landing.page');

// Staf Ahli Temporary
Route::resource('staf_Ahli', StaffAhliController::class, []);




// Auth Routes
Auth::routes();

// Admin Side Group Route
Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'isGeneralAdmin'])
    ->group(function () {
        // Index Dashboard
        Route::get('/', [AdminMiscController::class, 'index'])->name('index');
        // Articles Resource Controller
        Route::resource('articles', AdminArticleController::class);
        // Users Resource Controller
        Route::resource('users', AdminUserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'destroy' => 'users.destroy',
            'update' => 'users.update',
            'show' => 'users.show',
            'edit' => 'users.edit'
        ]);

        // Staff Ahli Resource Controller
        Route::resource('staff_ahli', AdminStaffAhliController::class);
        Route::get('download_komit_staff/{komitmen}', [AdminStaffAhliController::class, 'handlingDownloadFile'])->name('download.komit-staffAhli');
    });

// Guest Side Group Route
Route::name('guest.')
    ->prefix('guest')
    ->group(function () {
        // Landing Page
        Route::get('/', [GuestMiscController::class, 'index'])->name('guest.index');
    });

Route::name('pengumuman.')
    ->prefix('pengumuman')
    ->group(function () {
        Route::get('/staf-ahli', [StaffAhliController::class, 'showPengumumanForm'])->name('stafAhliForm');
        Route::post('/staf-ahli', [StaffAhliController::class, 'postPengumumanForm'])->name('postPengumumanForm');
    });
