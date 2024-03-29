<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = [
        'room_id',
        'user_id',
        'content',
    ];
    public function Room(){
        return $this->belongsTo(Room::class,'room_id');
    }
    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
