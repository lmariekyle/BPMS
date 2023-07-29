<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BHWController;
use App\Http\Controllers\SitioAssignmentController;
use App\Http\Controllers\ResidentUserController;
use App\Http\Controllers\Auth\AuthenticationAPIController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/bhwDashboard', [BHWController::class, 'mobileDashboard']);
Route::get('/mobileSitios', [SitioAssignmentController::class, 'mobileSitios']);
Route::post('/register', 'App\Http\Controllers\ResidentUserController@mobileStore');
Route::post('/login', 'App\Http\Controllers\Auth\AuthenticationAPIController@login');