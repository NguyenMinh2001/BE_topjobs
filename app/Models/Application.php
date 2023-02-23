<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'job_id', 'candidate_name', 'candidate_email', 'candidate_phone'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
