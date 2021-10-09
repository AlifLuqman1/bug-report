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

use App\Http\Controllers\Modules\BugReport\Admin\BrDepartmentController;
use App\Http\Controllers\Modules\BugReport\Admin\BrSectionController;
use App\Http\Controllers\Modules\BugReport\Admin\BrUnitController;
use App\Http\Controllers\Modules\BugReport\User\BrUserCreateReportController;
use App\Http\Controllers\Modules\BugReport\User\BrUserCreateErrorReportController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BugReport\User\UserCreateReportController;


Route::group( function () {

    include('bug-report/bradmin-web.php');
    include('bug-report/bruser-web.php');
    include('bug-report/brsetup-web.php');
    include('bug-report/bug-report-user.php');


    
});