<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Job;
use Illuminate\Http\Request;

class LikeControler extends Controller
{
    //
    public function favorite(Request $req){
        $user = $req->user();
        $Like = Like::create(['user_id'=> $user->id,
                            'job_post_id'=> $req->job_post_id
                            ]);
        return $Like;
    }
    public function delete_favorite(Request $req,$id_post){
        $user = $req->user();
        $Like = Like::where(['user_id'=> $user->id,
                            'job_post_id'=> $id_post
                            ])->delete();
        return $Like;
    }
    public function get_all_favorite(Request $req){
        $user = $req->user();
        // $id = $user->id;
        // $Jobs = Like::where(['user_id'=> $user->id])->with('job')->get();
        $Jobs = Job::where('status','hiển thị')->with('likes','company')
                ->whereHas('likes', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->get();
        return $Jobs;
    }
    public function get_favorite(Request $req, $id){
        $user = $req->user();
        $Like = Like::where(['user_id'=> $user->id, 'job_post_id'=> $id])->first();
        if($Like != null){
            return response()->json(['favorite'=> true]);
        }
        return response()->json(['favorite'=> false]);
    }
    public function get_job_favorite(Request $req,$id){
        $user = $req->user();
        // $id = $user->id;
        // $Jobs = Like::where(['user_id'=> $user->id])->with('job')->get();
        $Jobs = Like::where(['user_id'=>$user->id])->with('job')
                ->whereHas('job', function ($query) use ($id) {
                    $query->where('id', $id);
                })->first();
        return $Jobs;
    }
}
