<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    //
    public function user(){
        return $this->belongsTo('\App\User', 'friend_id', 'id');
    }

    public function scopeRequestAccepted($query){
        return $query->where(['status' => 1]);
    }
}
