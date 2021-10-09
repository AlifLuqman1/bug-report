<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BugReport\User\UserCreateReportController;
use App\Http\Controllers\UserCreateReporttController;
use App\Http\Controllers\UserCreateReportErrorController;
use App\Http\Controllers\UserViewProgressController;
use App\Http\Controllers\Admin1NotifyReportController;
use App\Http\Controllers\Admin2Controller;
use App\Http\Controllers\Admin3Controller;
use App\Http\Controllers\AdminViewProgressController;





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

Route::get('/main', function () {
    return view('bug-report.user.index');
});

Route::get('/test', function () {
    return view('bug-report.user.form1');
});

Route::get('/outer', function () {
    return view('bug-report.outer.firstpage');
});

Route::get('/create-report', [UserCreateReportController::class, 'create']);

//Route::get('/test1', 'UserCreateReportController@index');

Route::get('/users', [UserCreateReportController::class, 'index']);

Route::get('/create1', [UserCreateReportController::class, 'create1']);

Route::get('/create2', [UserCreateReportController::class, 'create2']);

Route::get('/progresslist', [UserCreateReportController::class, 'progresslist']);

Route::resource('report', UserCreateReporttController::class);

Route::resource('report2', UserCreateReportErrorController::class);

Route::resource('progress', UserViewProgressController::class);

Route::resource('admin/progress', AdminViewProgressController::class);

Route::resource('admin1notify', Admin1NotifyReportController::class);

Route::resource('admin2notify', Admin2Controller::class);

Route::resource('admin3notify', Admin3Controller::class);


// Route::post('/create', function()){
//     $create_report = new BugReportApplication();

// }

Route::post('/report/create', [UserCreateReporttController::class, 'store']);

Route::post('/report2/create2', [UserCreateReportErrorController::class, 'store']);

Route::post('/report/edit', [UserViewProgressController::class, 'edit']);

Route::post('/admin/report/edit', [AdminViewProgressController::class, 'edit']);

Route::post('/report/admin/update', [Admin1NotifyReportController::class, 'update']);

Route::post('/admin1notify/edit', [Admin1NotifyReportController::class, 'edit']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
