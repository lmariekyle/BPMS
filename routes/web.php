<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentUserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BHWController;

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

Route::middleware('guest')->group(function () {
    Route::get('create', [ResidentUserController::class, 'create'])->name('create');
    Route::post('create',[ResidentUserController::class, 'store']);

});

Route::group(['middleware'=>'auth'],function (){
    Route::get('welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::resource('bhw', \App\Http\Controllers\BHWController::class);
    Route::get('bhw', [BHWController::class, 'index'])->name('bhw');
    Route::get('bhw', [BHWController::class, 'index'])->name('bhw');
    Route::resource('assign', \App\Http\Controllers\SitioAssignmentController::class);
    Route::get('index', [AccountController::class, 'index'])->name('accounts');
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);
    Route::get('search', [AccountController::class, 'search'])->name('search');
    
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');


require __DIR__.'/auth.php';
