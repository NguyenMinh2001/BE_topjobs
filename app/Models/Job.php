<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'title', 'description', 'salary', 'location', 'company_id','type','requirement','benefit','deadline','status','quantity','position','profession'
    ];

    public function likes()
    {
        return $this->hasOne(Like::class,'job_post_id');
    }
    public function company()
    {
        return $this->belongsTo(User::class,'company_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class,'job_id');
    }
}
