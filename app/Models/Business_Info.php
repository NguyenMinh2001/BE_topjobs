<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_Info extends Model
{
    use HasFactory;
    protected $table = "business_infos";
    protected $guarded = [];
}
