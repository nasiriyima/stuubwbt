<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Nqxcode\LuceneSearch\Model\SearchableInterface;
use Nqxcode\LuceneSearch\Model\SearchTrait;


class User extends Authenticatable implements SearchableInterface
{
    use SearchTrait;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $dates = ['last_login'];

    public static function searchableIds()
    {
        return self::whereUserType(true)->lists('id');
    }

    public function profile(){
        return $this->hasOne('\App\Profile');
    }

    public function history(){
        return $this->hasMany('\App\History');
    }

    public function friendship(){
        return $this->hasMany('\App\Friendship');
    }

    public function school(){
        return $this->hasManyThrough('\App\School', '\App\Profile', 'user_id', 'id', 'id');
    }

    public function sender(){
        return $this->hasMany('\App\Message', 'sender_id', 'id');
    }

    public function receiver(){
        return $this->hasMany('\App\Message', 'receiver_id', 'id');
    }

    public function scopeStudentUsers($query){
        return $query->where('user_type', 1)->get();
    }
    
    public function scopeStaffUsers($query){
        return $query->where('user_type', 2)->get();
    }
}
