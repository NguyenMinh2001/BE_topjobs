<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Jobs;
use Auth;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function get_all_user_bussiness(){
        $user = User::where(['role'=>0])->withCount('Jobs')->get();
    // $user = User::with('Business_Info')->get();
        foreach($user as $users){
                $users->Business_Info;
       }
       return response()->json($user);
    }
    public function get_info($id){
        $user = User::where(['id'=>$id])->with('Business_Info')->first();
        return $user;
    }
    public function test(){
        $user = User::with('likes')->with('likes',function($query){
            $query->with('job');
        })->find(6);
        // $likes = $user->likes;
        // foreach($likes as $like){
        //     $like->job;
        // }
        return $user;
    }
}
