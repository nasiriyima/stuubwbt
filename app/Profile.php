<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    public function school(){
        return $this->belongsTo('\App\School');
    }

    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function scopeStatistics($query){
        $profile = $query->first();
        $percentage = 0.0;
        if($profile){
            $count = 0;
            $count = ($profile->description)? $count + 1 : $count + 0;
            $count = ($profile->phone)? $count + 1 : $count + 0;
            $count = ($profile->email)? $count + 1 : $count + 0;
            $count = ($profile->address)? $count + 1 : $count + 0;
            $count = ($profile->social_contact)? $count + 1 : $count + 0;
            $count = ($profile->school_id)? $count + 1 : $count + 0;
            $count = ($profile->image)? $count + 1 : $count + 0;
            $count = ($profile->nick_name)? $count + 1 : $count + 0;
            $count = ($profile->dob)? $count + 1 : $count + 0;
            $count = ($profile->user_id)? $count + 1 : $count + 0;
            $percentage = ($count/10) * 100;
        }

        return $percentage;
    }
}
