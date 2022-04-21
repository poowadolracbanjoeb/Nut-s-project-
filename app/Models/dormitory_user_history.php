<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dormitory_user_history extends Model
{
    protected $fillable = [
        'semester',
        'room',
        'dormName',
        'id_users',
         
    ];

    protected $table ="dormitory_user_history";

    public function getUser(){
        return $this->belongsTo(User::class,'id_users');
    }
}
