<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
    
    public function scopeStudentUsers($query){
        return $query->where('user_type', 1)->get();
    }
    
    public function scopeStaffUsers($query){
        return $query->where('user_type', 2)->get();
    }
}
