<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_has_activities extends Model
{
    // use HasFactory;
    protected $fillable = [
        'id_users',
        'activityId',
        'activityScore'
    ];
    protected $table = "users_has_activities";
}
