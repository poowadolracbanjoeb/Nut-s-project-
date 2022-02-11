<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_responsible_dorm extends Model
{
    // use HasFactory;
    protected $fillable=[
        'activityID ',
        'id_dorm',];
    protected $table ="activity_responsible_dorm";
}
