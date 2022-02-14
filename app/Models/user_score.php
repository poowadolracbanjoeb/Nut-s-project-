<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_score extends Model
{
    protected $fillable = [
        'id_users',
        'semester',
        'count_of_activities',
        'dormName',
        'sum_score',
         
    ];

    protected $table ="user_score";
}
