<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckName extends Model
{
    // use HasFactory;
    protected $fillable=[
        'id_users',
        'activityId',];
    protected $table ="users_has_activities";
}
