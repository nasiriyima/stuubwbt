<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    public function option(){
        return $this->hasMany('\App\Option');
    }
    
    public function exam(){
        return $this->belongsTo('\App\Exam');
    }
}
