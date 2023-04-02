<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Job;
use App\Mail\SendEmail;
use App\Mail\MailJob;
use App\Mail\ListApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class SendMailController extends Controller
{
    //
    public function verify_business($id){
        $user = User::find($id);
        $user->business_auth = 1;
        $user->save();
        $details = [ 
            'name' => $user->name,
            'Description' => 'Tài khoản của bạn đã được xác nhận, bây giờ bạn có thể đăng tin tuyển dụng.'
        ];
        Mail::to($user->email)->send(new SendEmail($details));
        return back()->with('status','gửi mail thành công');
    }
    public function notice_candidates($id){ 
        $job = Job::find($id);
        $users = User::where(['role'=>2])->whereHas('Tags',function($query) use($job){
            $query->where('title',$job->profession);
        })->get();
        $recipients = [];

        foreach ($users as $user) {
            $recipients[] = $user->email;
        }
        //  return $recipients;
       
        Mail::to('kaijmas2000@gmail.com')->bcc($recipients)->send(new MailJob($job));
        return response()->json(['message' => 1]);
    }
    public function notice_application($id){
        $job = Job::with('company','applications')->find($id);
        $user = $job->company;
        $applications = $job->applications;
        Mail::to($user->email)->send(new ListApplication($applications));
        return response()->json(['message' => 1]);
    }
}
