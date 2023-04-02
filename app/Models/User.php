<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function likes(){
        return $this->hasMany(Like::class,'user_id');
    }
    public function Business_Info(){
        return $this->hasMany(Business_Info::class,'id_business');
    }
    public function Jobs(){
        return $this->hasMany(Job::class,'company_id','id');
    }
    public function Messages(){
        return $this->hasMany(Messages::class,'user_id','id');
    }
    public function Tags(){
        return $this->hasMany(Tag::class,'user_id','id');
    }
    public function Applications(){
        return $this->hasMany(Application::class,'user_id','id');
    }
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'avatar',
        'business_auth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
