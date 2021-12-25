<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    // use HasFactory;
    protected $fillable=[
        'activityId',
        'activityName',
        'activityPlace',
        'activityStarDate',
        'activityEndDate',
        'activityScore',
        'activityFile',
        'activityAdvice',
        'activityResponsible',
        'activity_Target',
        'activity_Budget',
        'activity_Year',
        'id_type',
        'created_at',
        'update_at',
        'id_status'];
    protected $table ="activities";
}
