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
use App\Http\Controllers\Guest\PendaftaranController as GuestPendaftaranController;
use App\Http\Controllers\Guest\DepartmentController as GuestDepartmentController;
use App\Http\Controllers\Guest\ProfileController as GuestProfileController;

// Temporary
use GuzzleHttp\Client;


// Temporary Staff Ahli
use App\Http\Controllers\stafAhli as StaffAhliController;
// Temporary for Testing
use App\Http\Controllers\Testing\UploadController;

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

// Php info to know about the server
Route::get('php-info', function () {
    phpinfo();
});

Route::view('testing-api-com', 'testing-api-com');
Route::get('testing-api-member-com', function () {
    $client = new Client();
    $api_request = $client->get('http://backoffice.com-indo.com/api/v1/user/members');
    $json_response = json_decode($api_request->getBody()->getContents());
    return response()->json($json_response);
});

// Temporaries dan testing
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

// profile -> Route untuk show profile EMTI dan BPMTI
Route::name('profile.')
    ->prefix('profile')
    ->group(function () {
        Route::get('/{sub}', [GuestProfileController::class, 'showProfile'])->name('showProfile');
    });

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
// open-tender -> Rount untuk membuka open tender kalau ada yang mau jadi kapel atau apapun itu
Route::name('open-tender.')
    ->prefix('open-tender')
    ->group(function () {
        // Index page -> Redirect to lates updated, but for now, it will be the tester
        Route::get('', [GuestEventRegistrationController::class, 'index'])->name('index');
        // Route::post('/item-store', [GuestEventRegistrationController::class, 'preStoreItem'])->name('preStoreItem');
        Route::get('berkas/{stringName}', [GuestOpenTenderController::class, 'downloadBerkas'])->name('downloadBerkas');
        // Get and Post Routes
        Route::get('/{eventName}', [GuestOpenTenderController::class, 'showFromName'])->name('showFromName');
        Route::post('/{eventName}', [GuestOpenTenderController::class, 'storeOpenTenderRegistration'])->name('storeOpenTenderRegistration');
    });

// Testing view for progress bar upload
Route::name('progress-bar.')
    ->prefix('testing-upload-progress-bar')
    ->group(function () {
        // Return view
        Route::view('/', 'testing/form-upload')->name('view');
        Route::post('/upload', [UploadController::class, 'uploadSubmit'])->name('upload');
        Route::post('/', [UploadController::class, 'storeData'])->name('post');
    });

// Auth Routes and it's defined for admin
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

Route::name('guest.')
    ->group(function () {
        // Landing Page
        Route::get('/', [GuestMiscController::class, 'landingPage'])->name('landing.page');

        // department -> Route untuk show per departement yang ada di KBMTI
        Route::name('department.')
            ->prefix('department')
            ->group(function () {
                // For testing purpose
                // Route::get('', [GuestDepartmentController::class, 'index'])->name('index');
                // For specificaly departemen name
                Route::get('/{deptName}', [GuestDepartmentController::class, 'showDepartment'])->name('showDepartment');
            });

        // event-registration -> Route Registrasi Event-event yang ada di KBMTI
        Route::name('event-registration.')
            ->prefix('pendaftaran-event')
            ->group(function () {
                // Index page -> Redirect to lates updated, but for now, it will be the tester
                // Route::get('', [GuestEventRegistrationController::class, 'index'])->name('index');
                // Get and Post Routes
                Route::get('/{eventName}', [GuestEventRegistrationController::class, 'showFromName'])->name('showFromName');
                Route::post('/{eventName}', [GuestEventRegistrationController::class, 'storeEventRegistration'])->name('storeEventRegistration');
            });

        // Route unique karena bentuk struktur tidak mengikuti seperti yang lain
        Route::group([
            'prefix' => '{allowed_prefixes}',
            'as' => 'pendaftaran-kepanitiaan-dan-open-tender.',
            'middleware' => []
        ], function () {
            Route::get('berkas/{stringName}', [GuestPendaftaranController::class, 'downloadBerkas'])->name('downloadBerkas');
            // Get and Post Routes
            Route::get('/{eventName}', [GuestPendaftaranController::class, 'showFromName'])->name('showFromName');
            Route::post('/{eventName}', [GuestPendaftaranController::class, 'storePendaftaran'])->name('storePendaftaran');
        });
    });
