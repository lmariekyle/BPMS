<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResidentUserController;

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

Route::get('/accountnotice', function(){
    return view('auth.accountnotice');
});

Route::middleware('guest')->group(function () {
    Route::get('create', [ResidentUserController::class, 'create'])->name('create');
    Route::post('create',[ResidentUserController::class, 'store']);
    // Route::get('accountnotice', [ResidentUserController::class, 'index'])->name('accountnotice');
    // Route::get('/accountnotice', function(){
    //     return view('auth.accountnotice');
    //  });
});

Route::group(['middleware'=>'auth'],function (){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('welcome', function () {
        return view('welcome');
    })->name('welcome');
    Route::resource('bhw', \App\Http\Controllers\BHWController::class);
    Route::resource('assign', \App\Http\Controllers\SitioAssignmentController::class);
    Route::resource('accounts', \App\Http\Controllers\AccountController::class);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');


require __DIR__.'/auth.php';
