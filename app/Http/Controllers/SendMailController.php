<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Mail\SendEmail;
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
}
