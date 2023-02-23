<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApi;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SendMailController;
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

Route::get('/login-admin', function () {
    return view('login');
});
Route::post('/login-admin/account', [AuthApi::class,'login_admin']);

Route::middleware('isAdmin')->group(function(){    
        Route::get('/business_management', function () {
        return view('business_management');
        });
        Route::get('/dashboard', function () {
            return view('dashboard');
         });
        Route::get('/verifyBusiness/{id}',[SendMailController::class,'verify_business']);
});

