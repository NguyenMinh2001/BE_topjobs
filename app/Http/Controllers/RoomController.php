<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function create(Request $req){
        $room = Room::create([
            'name' =>$req->name
        ]);
        return $room;
    }
    public function get_room($room_id){
        $room = Room::find($room_id);
        return $room;
    }
}
