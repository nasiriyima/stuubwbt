<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    //
    public function user(){
        return $this->belongsTo('\App\User', 'friend_id', 'id');
    }

    public function profile(){
        return $this->hasManyThrough('\App\Profile', '\App\User', 'id', 'user_id', 'friend_id');
    }

    public function school(){
        return $this->hasManyThrough('\App\School', '\App\Profile', 'user_id', 'id', 'friend_id');
    }
    public function scopeRequest($query){
        return $query->where(['status' => 0]);
    }

    public function scopeRequestAccepted($query){
        return $query->where(['status' => 1]);
    }
}
