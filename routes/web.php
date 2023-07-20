<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ResidentUserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BHWController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SitioCountController;

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

Route::get('/', [StatisticsController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('create', [ResidentUserController::class, 'create'])->name('create');
    Route::post('create',[ResidentUserController::class, 'store']);

});

Route::group(['middleware'=>'auth'],function (){
    Route::get('welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('profile', [RegisteredUserController::class, 'index'])->name('profile');
    Route::get('profile', [ResidentUserController::class, 'show'])->name('profile');
    Route::resource('bhw', \App\Http\Controllers\BHWController::class);
    Route::get('bhw', [BHWController::class, 'index'])->name('bhw');
    Route::get('bhw', [BHWController::class, 'index'])->name('bhw');
    Route::get('bhwSearch', [BHWController::class, 'search'])->name('bhwSearch');
    Route::resource('assign', \App\Http\Controllers\SitioAssignmentController::class);
    Route::get('index', [AccountController::class, 'index'])->name('accounts');
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);
    Route::get('search', [AccountController::class, 'search'])->name('search');
    Route::resource('welcome', \App\Http\Controllers\StatisticsController::class);
    Route::get('welcome', [StatisticsController::class, 'index'])->name('statistics');
    Route::get('welcome', [StatisticsController::class, 'index'])->name('chartdata'); 
});

Route::get('/dashboard', [StatisticsController::class, 'reports'], function () {
    Route::resource('dashboard', \App\Http\Controllers\StatisticsController::class);
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');



require __DIR__.'/auth.php';
