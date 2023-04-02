<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function create(Request $req){
        $user = $req->user();
        $message = Message::create([
            'content' => $req->content,
            'user_id' => $user->id,
            'room_id' => $req->room_id
        ]);
        return $message;
    }
}
