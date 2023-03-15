<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthApi extends Controller
{
    //
    public function response($user)
    {
        $token = $user->createToken( str()->random(40) )->plainTextToken;
        return response() -> json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function register(Request $req)
    {
        $req->validate([
           'name' => 'required|min:4',
           'email' => 'required|email|unique:users',
           'password'=> 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'role' => $req->role,
            'password' => bcrypt($req->password),
            'avatar' => "avarta/NUXCELp2jWm2YHtJYP3ecl682eDADnCzy2BA6MjB.webp"
        ]);

        return $this->response($user);
    }

    public function login(Request $req)
    {
        $cred = $req->validate([
           'email' => 'required|email|exists:users',
           'password'=> 'required|min:6'
        ]);
        if(!Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role' => $req->role])){
            return response()->json([
                'message'=>'Unauthorized.'
            ],401);
        }
        return $this->response(Auth::user());
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'message'=> 'You have successfully logged out and token was successful delete'
        ]);
    }

    public function update_user($id , Request $req)
    {
        // return dd($req->all());
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $avatar = Storage::putFile('avarta', $req->avatar);
        // $user->name = $req->name;
        $user->avatar = $avatar;
        // $user->email = $request->input('email');
        $user->save();

        return response()->json($user);
    }

    public function login_admin(Request $req)
    {
        $cred = $req->validate([
            'email' => 'required|email|exists:users',
            'password'=> 'required|min:6'
         ]);
         if(Auth::attempt(['email'=>$req->email,'password'=>$req->password,'role' => 1])){
            $user = User::where(['email'=>$req->email])->first();
            Session::put('admin',$user->name);
            Session::put('email',$user->email);
            return redirect('/dashboard');
         }
         return redirect('login-admin')->with('danger','Đăng nhập thất bại vui lòng đăng nhập lại');
    }
}
