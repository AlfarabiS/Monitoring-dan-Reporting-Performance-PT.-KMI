<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
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
    return view('/auth/login',[]);
});

Route::get('/tracking', function () {
    return view('/admin/tracking',[
        'user'=>'Alfarabi',
        'judul'=>'Tracking'
    ]);
});


Route::get('/report', function () {
    return view('/admin/report',[
        'user'=>'Alfarabi',
        'judul'=>'Report'
    ]);
    
});

Route::get('/user', function () {
    return view('/user/index',[]);
});

Route::get('/checkout', function () {
    return view('/user/checkout',[]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
