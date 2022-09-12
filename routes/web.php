<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/tracking', [OnGoingController::class, 'index'])->name('dashboard')->middleware('isAdmin');
Route::get('/dashboard', [OnGoingController::class, 'index'])->name('dashboard')->middleware('isAdmin');

Route::get('/report', [ReportController::class, 'index'])->middleware('isAdmin');



Route::get('/user', function () {
    return view('/user/index',[]);
});

Route::get('/checkout', function () {
    return view('/user/checkout',[]);
});



