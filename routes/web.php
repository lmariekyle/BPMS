<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ResidentUserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BHWController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SitioCountController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\NotificationController;
use App\Models\Statistics;
use Hydrat\Laravel2FA\Controllers\TwoFactorAuthController;
use Spatie\Permission\Models\Role;

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

//guest//
Route::middleware('web')->group(function () {
    Route::get('create', [ResidentUserController::class, 'create'])->name('create');
    Route::post('create', [ResidentUserController::class, 'store']);
});
Route::post('/callback', [ServicesController::class, 'callback'])->name('callback');

Route::get('index', [TwoFactorAuthController::class, 'index'])->name('auth.2fa.token');
// Route::middleware(['role:User'])->group(function () {
//     Route::get('request/{docType}', [ServicesController::class, 'request'])->name('services.request');
//     Route::post('request/{docType}', [ServicesController::class, 'storerequest'])->name('services.storerequest');
//     // Route::post('payment', [ServicesController::class, 'paymentrequest'])->name('services.gcash');
//     Route::post('createpayment/{id}', [ServicesController::class, 'createpayment'])->name('services.createpayment');
//     Route::get('success', function () {
//         return view('services.success');
//     })->name('services.success');
// });
Route::get('/residents/get-current-user-info', [ResidentUserController::class, 'getUserInfo']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('landingpage', [LandingPageController::class, 'index'])->name('landingpage');
    Route::get('searchResident', function () {
        return view('searchResident');
    })->name('searchResident');
    Route::get('personalInfoUpdate', function () {
        return view('personalInfoUpdate');
    })->name('personalInfoUpdate');
    Route::get('profile', [RegisteredUserController::class, 'index'])->name('profile');
    Route::get('profile', [ResidentUserController::class, 'show'])->name('profile');
    Route::get('change_password', [ProfileController::class, 'change_password'])->name('change_password');
    Route::post('update_password', [ProfileController::class, 'update_password'])->name('update_password');
    Route::resource('bhw', \App\Http\Controllers\BHWController::class);
    Route::get('bhw', [BHWController::class, 'index'])->name('bhw');
    Route::get('bhwSearch', [BHWController::class, 'search'])->name('bhwSearch');
    Route::resource('assign', \App\Http\Controllers\SitioAssignmentController::class);
    Route::get('index', [AccountController::class, 'index'])->name('accounts');
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);
    Route::get('search', [AccountController::class, 'search'])->name('search');
    //Route::resource('welcome', \App\Http\Controllers\StatisticsController::class);
    Route::get('statistics', [StatisticsController::class, 'index'])->name('statistics');
    Route::get('chartdata', [StatisticsController::class, 'index'])->name('chartdata');
    Route::resource('services', \App\Http\Controllers\ServicesController::class);
    Route::get('dashboard', [ServicesController::class, 'residentDashboard']);
    Route::get('/direction/{id}', [ServicesController::class, 'direction'])->name('direction');
    Route::get('/manage/{id}', [ServicesController::class, 'manage'])->name('manage');
    Route::get('/accepted/{id}', [ServicesController::class, 'accepted'])->name('accepted');
    Route::get('generate', [ServicesController::class, 'generate']);
    Route::get('/approve/{id}', [ServicesController::class, 'approve'])->name('approve');
    Route::get('/pdf/viewdoc/{id}', [ServicesController::class, 'pdfGeneration'])->name('pdf.export');
    Route::get('/deny/{id}', [ServicesController::class, 'deny'])->name('deny');
    Route::get('/approval/{id}', [ServicesController::class, 'approval'])->name('approval');
    Route::get('/forwarded/{id}', [ServicesController::class, 'forwarded'])->name('forwarded');
    Route::get('/signed/{id}', [ServicesController::class, 'signed'])->name('signed');
    Route::get('/released/{id}', [ServicesController::class, 'released'])->name('released');
    Route::get('request', [ServicesController::class, 'request']);
    Route::get('requestSearch', [ServicesController::class, 'search'])->name('requestSearch');
    Route::get('/view_file/{file}', [ServicesController::class, 'view_file'])->name('view_file');
    Route::resource('auth', \App\Http\Controllers\NotificationController::class);
    Route::get('index', [NotificationController::class, 'index'])->name('notifications');
    Route::get('edit/{id}', [ResidentUserController::class, 'edit'])->name('auth.updateinfo');
    Route::post('update/{id}', [ResidentUserController::class, 'update'])->name('updateinfo');;
    Route::get('request/{docType}', [ServicesController::class, 'request'])->name('services.request');
    Route::post('request/{docType}', [ServicesController::class, 'storerequest'])->name('services.storerequest');
    Route::post('createpayment/{id}', [ServicesController::class, 'createpayment'])->name('services.createpayment');
    // Route::post('payment', [ServicesController::class, 'createpayment'])->name('services.gcash');
    Route::get('successpayment/{id}', [ServicesController::class, 'successpayment'])->name('services.success');
    // Route::get('successpayment/{id}', function () {
    //   return view('services.success');
    // })->name('services.success');
    Route::get('failurepayment/{id}', [ServicesController::class, 'failurepayment'])->name('services.failure');
    Route::get('/markRead/{id}', [NotificationController::class, 'markRead'])->name('viewNotifications');
    Route::get('/delete/{id}', [NotificationController::class, 'destroy'])->name('deleteNotifications');
});

Route::get('/dashboard', [StatisticsController::class, 'reports'], function () {
    Route::resource('dashboard', \App\Http\Controllers\StatisticsController::class);
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('exportpdf', [StatisticsController::class, 'exportpdf'], function () {
    Route::resource('exportpdf', \App\Http\Controllers\StatisticsController::class);
    Route::post('exportpdf', [
        'uses' => 'StatisticsController@print'
    ]);
    return view('exportpdf');
})->middleware(['auth', 'verified'])->name('exportpdf');



require __DIR__ . '/auth.php';