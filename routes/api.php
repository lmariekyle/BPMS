<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BHWController;
use App\Http\Controllers\SitioAssignmentController;
use App\Http\Controllers\ResidentUserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AuthenticationAPIController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\HouseholdRegistrationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ServicesController;
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

Route::post('/mobileLogin', 'App\Http\Controllers\Auth\AuthenticationAPIController@mobileLogin')->name('mobileLogin');
Route::post('/mobileLogout', 'App\Http\Controllers\Auth\AuthenticationAPIController@mobileLogout')->name('mobileLogout');

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/bhwDashboard', [BHWController::class, 'mobileDashboard']);
Route::post('/mobileUserData', [AccountController::class, 'mobileUserData']);
Route::post('/mobileRequestServices', [DocumentController::class, 'mobileRequestServices']);
Route::post('/mobileGetDocuments', [DocumentController::class, 'mobileGetDocuments']);
Route::get('/mobileSitios', [SitioAssignmentController::class, 'mobileSitios']);
Route::post('/mobileHouseList', [SitioAssignmentController::class, 'mobileHouseList']);
Route::post('/register', 'App\Http\Controllers\ResidentUserController@mobileStore');
Route::post('/sitioAssignment', [SitioAssignmentController::class, 'mobileSitiosAssignment']);
Route::post('/household', 'App\Http\Controllers\HouseholdRegistrationController@mobileStore');
Route::post('/forgotPassword', 'App\Http\Controllers\Auth\PasswordResetLinkController@mobileStore')->name('mobileForgotPassword');
Route::post('/payment', [ServicesController::class, 'paymentrequest']);