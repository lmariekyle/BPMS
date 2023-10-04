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
    Route::get('/manage/{id}', [ServicesController::class, 'manage'])->name('manage');
    Route::get('generate', [ServicesController::class, 'generate']);
    Route::get('/approve/{id}', [ServicesController::class, 'approve'])->name('approve');
    Route::get('/deny/{id}', [ServicesController::class, 'deny'])->name('deny');
    Route::get('/approval/{id}', [ServicesController::class, 'approval'])->name('approval');
    Route::get('request', [ServicesController::class, 'request']);
    Route::get('requestSearch', [ServicesController::class, 'search'])->name('requestSearch');
    Route::resource('auth', \App\Http\Controllers\NotificationController::class);
    Route::get('index', [NotificationController::class, 'index']);
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
