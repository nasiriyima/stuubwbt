<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    //
    public function user(){
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    public function friend(){
        return $this->belongsTo('\App\User', 'friend_id', 'id');
    }

    public function friendship(){
        return $this->hasManyThrough('\App\Friendship', '\App\User', 'id', 'user_id', 'user_id');
    }

    public function profile(){
        return $this->hasManyThrough('\App\Profile', '\App\User', 'id', 'user_id', 'friend_id');
    }

    public function school(){
        return $this->hasManyThrough('\App\School', '\App\Profile', 'id', 'id', 'friend_id');
    }

    public function scopeRequestPending($query){
        return $query->with('friend', 'profile', 'school', 'friendship')->where(['status' => 0]);
    }

    public function scopeRequestAccepted($query){
        return $query->with('friend', 'profile', 'school', 'friendship')->where(['status' => 1]);
    }

    public function scopeRequests($query){
        return $query->whereIn('status', [0,1]);
    }

    public function scopeSuggestion($query){
        return $query->where('status', '=', 1);
    }
}
