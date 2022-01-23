<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activities_types extends Model
{
    // use HasFactory;
    protected $fillable=[
        'id_type',
        'typeName',];
    protected $table ="activities_types";
}
