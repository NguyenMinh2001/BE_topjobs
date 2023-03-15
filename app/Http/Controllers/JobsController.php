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
    public function get_jobs_type($type){
        $job = Job::Where(['type' => $type ,'status'=>'hiển thị'])->orderBy('created_at','desc')->with('company')->paginate(10);
        return $job;
    }
    public function get_all_jobs(){
        $job = Job::Where(['status'=>'hiển thị'])->orderBy('created_at','desc')->with('company')->paginate(10);
        return $job;
    }
    public function get_list_jobs(){
        $job = Job::with('company')->withCount('applications')->orderBy('created_at','desc')->get();
        return $job;
    }
    public function delete_job($id){
        Job::where(['id'=>$id])->delete();
        return back();
    }
    public function hide_job($id){
        $job = Job::find($id);
        $job->status = 'hết hạn';
        $job->save();
        return back();
    }
    public function query_job(){
        $query = [];
        $titles = Job::distinct()->pluck('title');
        foreach($titles as $title){
            $query[] = $title;
        }
        $positions = Job::distinct()->pluck('position');
        foreach($positions as $position){
            $query[] = $position;
        }
        sort($query);
        return $query;
    }
    public function search_job($query){
        $jobs = Job::where('title', 'LIKE', '%'.$query.'%')->with('company')
                    ->orWhere('position', 'LIKE', '%'.$query.'%')
                    ->paginate();
        return $jobs;
    }
}
