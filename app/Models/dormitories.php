<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dormitories extends Model
{
    protected $fillable = [
        'year',
        'semester',
        'room',
        'dorm',
        'dorm_service', 
         
    ];

    protected $table ="dormitories";
}
