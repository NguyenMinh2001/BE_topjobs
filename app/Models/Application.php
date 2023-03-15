<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'job_id',"user_id", 'email', 'description','full_name','resume'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
