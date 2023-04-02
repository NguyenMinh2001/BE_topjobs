<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    //
    public function create_tag(Request $req){
        $user = $req->user();
        $tag = Tag::create([
            'user_id'=> $user->id,
            'title'=> $req->title,
        ]);
        return $tag;
    }
    public function delete_tag(Request $req){
        $user = $req->user();
        $tags = Tag::where([
            'user_id' => $user->id,
            'title' => $req ->title,
        ])->delete();
        return $tags;
    }
    public function get_tag(Request $req){
        $user = $req->user();
        $titles = Tag::where(['user_id'=>$user->id])->distinct()->pluck('title');
        $query =[];
        foreach($titles as $title){
            $query[] = $title;
        }
        return $query;
    }
}
