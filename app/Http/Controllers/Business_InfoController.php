<?php

namespace App\Http\Controllers;
use App\Models\Business_Info;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class Business_InfoController extends Controller
{
    //
    public function get_info($id)
    {
        $info = Business_Info::where(['id_business'=> $id ])->get();
        return $info;
    }
    //
    public function post_info(Request $req)
    {
        // return dd($req);
        $req->validate([
            'address' => 'required',
            'phone' => 'required|min:10|max:10',
            'license' => 'required'
         ]);
        $path = Storage::putFile('license', $req->license);
        $info = Business_Info::create([
            'id_business'=>$req->id_business,
            'address' => $req->address,
            'phone' => $req->phone,
            "license" => $path
        ]);

        return response() -> json([
          'data' =>  $info,
        ]);
    }
    public function update_info($id,Requst $req)
    {
        $info=Business_Info::where(['id_business'=>$id])->update($req->all());
        return $info; 
    }
}
