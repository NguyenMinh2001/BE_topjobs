<?php
use App\Http\Controllers\AuthApi;
use App\Http\Controllers\Business_InfoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobsController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('image/{path}', function($path){
    $image = Storage::get($path);
    return response($image, 200)->header('Content-Type', Storage::mimeType($path));
})->where('path', '.*');
Route::post('image',function(Request $request){
    $image = Storage::putFile('avarta',$request->image);
    return $image;
});
Route::get('test',function(){
    $url = Storage::url('NUXCELp2jWm2YHtJYP3ecl682eDADnCzy2BA6MjB.webp');
    return $url;
});
// Route::get('user-business',function(){
//    $user= User::where(['role'=>0])->get();
//    return $user;
// });
Route::post('register',[AuthApi::class,'register']);
Route::post('login',[AuthApi::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout',[AuthApi::class,'logout']);
    Route::put('user/{id}',[AuthApi::class,'update_user']);
    Route::get('user',function(Request $request){
        return $request->user();
    });
    
    Route::get('Business_info/{id}',[Business_InfoController::class,'get_info']);
    Route::post('Business_info',[Business_InfoController::class,'post_info']);
    Route::put('Business_info/{id}',[Business_InfoController::class,'update_info']);
    
    Route::post('Jobs/{id}',[JobsController::class,'post_jobs']);
    Route::put('Jobs/{id}',[JobsController::class,'update_jobs']);
    Route::get('Jobs/{id}',[JobsController::class,'get_jobs']);
    Route::get('Job/{id}',[JobsController::class,'get_job']);
});
// Route::post('/')
Route::get('/user_bussiness',[UserController::class,'get_all_user_bussiness']);
Route::middleware('isAdmin')->group(function(){
   
});