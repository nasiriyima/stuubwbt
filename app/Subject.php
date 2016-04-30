<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function category(){
        return $this->belongsTo('\App\Category');
    }
    
    public function exam(){
        return $this->hasMany('\App\Exam');
    }
}
