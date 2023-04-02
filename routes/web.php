<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;
use App\Models\User;
use App\Http\Controllers\AuthApi;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobsController;
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
        Route::get('/',function(){
            return redirect('dashboard');
        });
        Route::get('/logout_adimin', [AuthApi::class,'logout_adimin']);
        Route::get('/jobs', function () {
            return view('list_jobs');
        });
        Route::get('/business_management', function () {
        return view('business_management');
        });
        Route::get('/application_user', function () {
            return view('application_user');
        });
        
        Route::get('/dashboard', function () {
            $job_new = Job::with('company')->orderBy('created_at','desc')->paginate(5);
            $user_new = User::whereIn('role',[0,2])->orderBy('created_at','desc')->paginate(5);
            return view('dashboard',compact('job_new','user_new'));
            // return dd($job_new->toArray());
         });
        Route::get('/delete_job/{id}',[JobsController::class,'delete_job']);
        Route::get('/hide_job/{id}',[JobsController::class,'hide_job']);
        Route::get('/mail_job/{id}',[SendMailController::class,'notice_candidates']);
        Route::get('/mail_applications/{id}',[SendMailController::class,'notice_application']);
        Route::get('/verifyBusiness/{id}',[SendMailController::class,'verify_business']);
});

