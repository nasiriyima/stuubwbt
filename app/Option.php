<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    public function scopeCorrectAnswer($query){
        return $query->where('status',1)->first();
    }
}
