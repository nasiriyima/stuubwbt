<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function school(){
        return $this->belongsTo('\App\School');
    }

    public function friendship(){
        return $this->hasMany('\App\Friendship');
    }
}
