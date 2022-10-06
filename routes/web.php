<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OnGoingController;
use App\Http\Controllers\SuperadminController;
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
//Login Route
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard Route
Route::get('/tracking', [OnGoingController::class, 'tracking'])->middleware('isAdmin','auth');
Route::get('/tracking/fg', [OnGoingController::class, 'fg'])->middleware('isAdmin','auth');
Route::get('/tracking/rm', [OnGoingController::class, 'rm'])->middleware('isAdmin','auth');
Route::get('/tracking/pm', [OnGoingController::class, 'pm'])->middleware('isAdmin','auth');
Route::get('/dashboard', [OnGoingController::class, 'tracking'])->name('dashboard')->middleware('isAdmin','auth');
Route::get('/dashboard/search', [OnGoingController::class, 'index'])->name('dashboard')->middleware('isAdmin','auth');
Route::get('/report', [ReportController::class, 'index'])->middleware('isAdmin','auth');
Route::get('/report/export', [ReportController::class, 'exportReport'])->middleware('isAdmin','auth');


// Operator Route
Route::get('/user', [UserController::class, 'index'])->middleware('auth','isActive');
Route::post('/user/fg', [UserController::class, 'fg'])->middleware('auth');
Route::post('/user/rm', [UserController::class, 'rm'])->middleware('auth');
Route::post('/user/pm', [UserController::class, 'pm'])->middleware('auth');
Route::get('/user/checkout', [UserController::class, 'checkoutIndex'])->name('chekout')->middleware('auth');
Route::post('/user/checkin', [UserController::class, 'checkin'])->name('checkin')->middleware('auth');
Route::post('/user/checkout', [UserController::class, 'checkout'])->middleware('auth');
Route::post('/user/hold', [UserController::class, 'hold'])->middleware('auth');
Route::get('/user/hold/running', [UserController::class, 'holdRunning'])->middleware('auth');
Route::post('/user/hold/start', [UserController::class, 'holdStart'])->middleware('auth');
Route::post('/user/hold/finish', [UserController::class, 'holdFinish'])->middleware('auth');
Route::post('/user/account', [UserController::class, 'account'])->middleware('auth');
Route::post('/user/account/post', [UserController::class, 'accountPost'])->middleware('auth');
Route::get('/user/forget', [UserController::class, 'forget'])->middleware('auth');


// Superadmin Route
Route::get('/administrator', [SuperadminController::class, 'user'])->middleware('isAdmin','auth');
Route::get('/administrator/user', [SuperadminController::class, 'user'])->middleware('isAdmin','auth');
Route::post('/administrator/user/edit', [SuperadminController::class, 'editUser'])->middleware('isAdmin','auth');
Route::post('/administrator/user/post', [SuperadminController::class, 'userPost'])->middleware('isAdmin','auth');
Route::post('/administrator/user/delete', [SuperadminController::class, 'userDelete'])->middleware('isAdmin','auth');
Route::get('/administrator/user/add', [SuperadminController::class, 'addUser'])->middleware('isAdmin','auth');
Route::get('/administrator/proses', [SuperadminController::class, 'proses'])->middleware('isAdmin','auth');
Route::get('/administrator/proses/add', [SuperadminController::class, 'addProses'])->middleware('isAdmin','auth');
Route::post('/administrator/proses/edit', [SuperadminController::class, 'editProses'])->middleware('isAdmin','auth');
Route::post('/administrator/proses/post', [SuperadminController::class, 'prosesPost'])->middleware('isAdmin','auth');
Route::post('/administrator/proses/delete', [SuperadminController::class, 'prosesDelete'])->middleware('isAdmin','auth');
// Route::post('/administrator/proses/post', [SuperadminController::class, 'editPost'])->middleware('isAdmin','auth');
// Route::post('/administrator/user/add', [SuperadminController::class, ''])->middleware('isAdmin','auth');

//Guest Route
Route::get('/', [GuestController::class, 'index'] );

Route::get('/testingan', function(){
    return view('/welcome');
});

// Route::get('/checkout', function () {
//     return view('/user/checkout',[]);
// });



// Route::get('/choose', function () {
//     return view('/user/choose',[]);
// });



