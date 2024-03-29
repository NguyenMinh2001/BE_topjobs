<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    public function create_application(Request $req){
        $user = $req->user();
        $req->validate([
            'full_name'=> 'required',
            'email' => 'required',
            'resume' => 'required'
        ]);
        $application = Application::create([
            'full_name'=> $req->full_name,
            'email' => $req->email,
            'resume' => $req->resume,
            'job_id' => $req-> job_id,
            'user_id' => $user->id,
            'description' => $req->description
        ]);
        return $application;
    }
    
    public function get_application_user(Request $req){
        $user = $req->user();
        $applications = Application:: where('user_id',$user->id)
                        ->distinct('resume','description','email','full_name','job_id')
                        ->select('resume', 'email','full_name')
                        ->get();
        return $applications;
    }
    public function get_application_jobs(Request $req){
        $user = $req->user();
        $applications = Application::with('user','job')->whereHas('job',function($query) use($user){
            $query->where(['company_id'=>$user->id]);
        })->get();
        return $applications;
    }
}
