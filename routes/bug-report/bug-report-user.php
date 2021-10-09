<?php

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

//per module naming/grouping

use App\Http\Controllers\Modules\BugReport\User\BrUserCreateReportController;
use App\Http\Controllers\Modules\BugReport\User\BrUserCreateErrorReportController;
use App\Http\Controllers\Modules\BugReport\User\BrUserProgressController;
use App\Http\Controllers\Modules\BugReport\User\BrUserFeedbackController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BugReport\User\UserCreateReportController;


#1 Staff
Route::group( function () {
    Route::resource('bruser-web', BrUserCreateReportController::class);
    Route::resource('bruser-web-error', BrUserCreateErrorReportController::class);
    Route::resource('bruserprogress-web', BrUserProgressController::class);
    Route::resource('bruserfeedback-web', BrUserFeedbackController::class);
    Route::resource('create-report', UserCreateReportController::class);

    //Route::post('add', [BrUserCreateReportController::class,'add']);
    //Route::post('adderror', [BrUserCreateReportController::class,'adderror']);  
    
    
});
