<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OnGoingController;
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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Dashboard Route
Route::get('/tracking/fg', [OnGoingController::class, 'fg'])->name('dashboard')->middleware('isAdmin','auth');
Route::get('/tracking/rm', [OnGoingController::class, 'rm'])->name('dashboard')->middleware('isAdmin','auth');
Route::get('/tracking/pm', [OnGoingController::class, 'pm'])->name('dashboard')->middleware('isAdmin','auth');
Route::get('/dashboard', [OnGoingController::class, 'fg'])->name('dashboard')->middleware('isAdmin','auth');
Route::get('/dashboard/search', [OnGoingController::class, 'index'])->name('dashboard')->middleware('isAdmin','auth');

Route::get('/report', [ReportController::class, 'index'])->middleware('isAdmin','auth');


// Operator Route
Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::post('/user/checkin', [UserController::class, 'checkin'])->middleware('auth');
Route::get('/user/fg', [UserController::class, 'fg'])->middleware('auth');
Route::get('/user/rm', [UserController::class, 'rm'])->middleware('auth');
Route::get('/user/pm', [UserController::class, 'pm'])->middleware('auth');

Route::get('/checkout', function () {
    return view('/user/checkout',[]);
});

// Route::get('/choose', function () {
//     return view('/user/choose',[]);
// });



