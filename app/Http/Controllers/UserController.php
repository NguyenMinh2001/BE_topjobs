<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function get_all_user_bussiness(){
       $user= User::where(['role'=>0])->get();
       foreach($user as $users){
        $users->Business_Info;
       }
       return response()->json($user);
    }
}
