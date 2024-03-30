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
use App\Http\Controllers\HouseholdListController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Models\Transaction;

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

Route::get('/mobileLogin', 'App\Http\Controllers\Auth\AuthenticationAPIController@mobileLogin')->name('mobileLogin');

Route::post('/sanctum/token', 'App\Http\Controllers\Auth\AuthenticationAPIController@sanctumLogin');
Route::post('/sanctum/otp', 'App\Http\Controllers\Auth\AuthenticationAPIController@mobileOTP');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
        $user = $request->user();
        $user->tokens()->delete();
        return $response = ['success' => true];
    });

Route::get('/bhwDashboard', [BHWController::class, 'mobileDashboard']);
Route::post('/mobileUserData', [AccountController::class, 'mobileUserData']);
Route::post('/mobileRequestServices', [DocumentController::class, 'mobileRequestServices']);
Route::post('/mobileGetDocuments', [DocumentController::class, 'mobileGetDocuments']);
Route::post('/register', 'App\Http\Controllers\ResidentUserController@mobileStore');
Route::post('/sitioAssignment', [SitioAssignmentController::class, 'mobileSitiosAssignment']);
Route::post('/forgotPassword', 'App\Http\Controllers\Auth\PasswordResetLinkController@mobileStore')->name('mobileForgotPassword');

Route::post('/mobileTransactionRequest', [TransactionController::class, 'mobileTransactionRequest']);
Route::post('/mobilePayment', [TransactionController::class, 'mobilePayment']);
Route::post('/mobileFileUpload', [TransactionController::class, 'fileUpload']);
Route::post('/mobileNotifications', [NotificationController::class, 'mobileNotifications']);
Route::post('/mobileNotificationDetails', [NotificationController::class, 'mobileNotificationDetails']);
Route::post('/mobileDeleteNotification', [NotificationController::class, 'mobileDeleteNotifications']);

Route::post('/household', 'App\Http\Controllers\HouseholdRegistrationController@mobileStore');
Route::post('/forgotPassword', 'App\Http\Controllers\Auth\PasswordResetLinkController@mobileStore')->name('mobileForgotPassword');
Route::post('/callback', [ServicesController::class, 'callback'])->name('mobileCallback');
Route::post('createpayment/{id}', [TransactionController::class, 'createpayment'])->name('createpayment');

//Route::middleware(['role:Barangay Health Worker'])->group(function () {
        
    Route::post('/registerHousehold',[HouseholdRegistrationController::class,'mobileHouseholdStore']);
    Route::post('/registerMembers',[HouseholdRegistrationController::class,'mobileResidentStore']);
    Route::post('/updateHousehold',[HouseholdRegistrationController::class,'mobileUpdateHouseholdStore']);
    Route::post('/updateMembers',[HouseholdRegistrationController::class,'mobileUpdateResident']);

    Route::get('/mobileSitios', [SitioAssignmentController::class, 'mobileSitios']);
    Route::get('/mobileHouseholdList', [HouseholdListController::class, 'mobileHouseholds']);
    Route::get('/mobileMembersList', [HouseholdListController::class, 'mobileMembers']);
    Route::get('/mobileinitMembers', [HouseholdListController::class, 'mobileRecentMembers']);
    Route::get('/mobileGetHouseholdNumber', [HouseholdListController::class, 'mobileGetHouseNumber']);
    Route::get('/mobileGetHousehold', [HouseholdListController::class, 'getHouseholdsPerYear']);
    Route::get('/mobileAddressList', [HouseholdListController::class, 'getAddressList']);
//});