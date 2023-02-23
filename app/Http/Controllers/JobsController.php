<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    //
    public function post_jobs($id,Request $req){
        $req->validate([
            'title' => 'required',
            'description'=> 'required',
            'location' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'requirement' => 'required',
            'benefit' => 'required',
            'deadline' => 'required',
            'quantity' => 'required',
            'position' => 'required',
        ]);
        $job = Job::create([
            'title' => $req->title,
            'description'=> $req->description,
            'location' => $req->location,
            'salary' => $req->salary,
            'type' => $req->type,
            'company_id' => $id,
            'requirement' => $req->requirement,
            'benefit' => $req->benefit,
            'deadline' => $req->deadline,
            'status' => 'hiển thị', 
            'quantity' => $req->quantity,
            'position' => $req->position,
        ]);
        return $job;
    }
    public function update_jobs($id,Request $req){
        $req->validate([
            'title' => 'required',
            'description'=> 'required',
            'location' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'requirement' => 'required',
            'benefit' => 'required',
            'deadline' => 'required',
            'quantity' => 'required',
            'position' => 'required',
        ]);
        $job = Job::where(['id'=> $id])->update([
            'title' => $req->title,
            'description'=> $req->description,
            'location' => $req->location,
            'salary' => $req->salary,
            'type' => $req->type,
            'company_id' => $req->company_id,
            'requirement' => $req->requirement,
            'benefit' => $req->benefit,
            'deadline' => $req->deadline,
            'status' => 'hiển thị', 
            'quantity' => $req->quantity,
            'position' => $req->position,
        ]);
        return $req;
    }
    public function get_jobs($id){
        $job = Job::where(['company_id'=> $id])->orderBy('created_at','desc')->get();
        return $job;
    }
    public function get_job($id){
        $job = Job::where(['id'=> $id])->get();
        return $job;
    }
}
