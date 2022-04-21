<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_users',
        'name',
        'email',
        'password',
        'tel',  
        'student_degree', 
        'student_faculty',    
        'student_score',     
        'id_role' ,      
   
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    
    protected $primaryKey = 'id_users';
    public $incrementing = false;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    use HasFactory;
    public function history() {
        return $this->hasMany(dormitory_user_history::class,'id_users','id');
    }
    public function userCheckName() {
        return $this->hasMany(users_has_activities::class,'id_users','id');
    }
}
