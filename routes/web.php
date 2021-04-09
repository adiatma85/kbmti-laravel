<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Admin Side Controller
use App\Http\Controllers\Admin\MiscController as AdminMiscController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

// Temporary Staff Ahli Controller
use App\Http\Controllers\admin\stafAhli as AdminStaffAhliController;

// Guest Side Controller
use App\Http\Controllers\Guest\MiscController as GuestMiscController;
use App\Http\Controllers\Guest\EventRegistration as GuestEventRegistrationController;



// Temporary Staff Ahli
use App\Http\Controllers\stafAhli as StaffAhliController;
use PhpParser\Node\Expr\FuncCall;

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

// Staf Ahli Temporary
// Route::resource('staf_Ahli', StaffAhliController::class, []);

// Grouped Guest Routes
Route::name('guest.')
    ->group(function () {
        // Landing Page
        Route::get('/', [GuestMiscController::class, 'landingPage'])->name('landing.page');
        // event-registration -> Route Registrasi Event-event yang ada di KBMTI
        Route::name('event-registration.')
            ->prefix('event-registration')
            ->group(function () {
                // Index page -> Redirect to lates updated, but for now, it will be the tester
                Route::get('', [GuestEventRegistrationController::class, 'index'])->name('index');
                // Get and Post Routes
                Route::get('/{eventName}', [GuestEventRegistrationController::class, 'showFromName'])->name('showFromName');
                Route::post('/{eventName}', [GuestEventRegistrationController::class, 'storeEventRegistration'])->name('storeEventRegistration');
            });
    });


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
            // names if needed
        ])->middleware(['isMasterAdmin']);

        // Event Controller
        Route::resource('events', AdminEventController::class);
        // For Controller in Staff Ahli
        Route::resource('staff_ahli', AdminStaffAhliController::class);
        Route::get('download_komit_staff/{komitmen}', [AdminStaffAhliController::class, 'handlingDownloadFile'])->name('download.komit-staffAhli');
    });

// Temporaries
// Temporary Pengumuman
Route::name('pengumuman.')
    ->prefix('pengumuman')
    ->group(function () {
        Route::get('/staf-ahli', [StaffAhliController::class, 'showPengumumanForm'])->name('stafAhliForm');
        Route::post('/staf-ahli', [StaffAhliController::class, 'postPengumumanForm'])->name('postPengumumanForm');
    });
// Temporary Email Testing in Guest/MiscController
Route::name('email.')
    ->prefix('email')
    ->group(function () {
        Route::get('/testing-sending', [GuestMiscController::class, 'sendingEmail'])->name('sendingEmail');
    });

// Testing Ground
Route::get('article-testing-card', function () {
    return view('Admin.Article.testing-artcile-card');
});

Route::get('php-info', function () {
    phpinfo();
});

Route::get('accessing-google', [GuestMiscController::class,  'accessingAnotherServer']);

Route::get('testing-open-tender-view', function () {
    return view('general.event-registration.open-tender-page');
});
