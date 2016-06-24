<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function profile(){
        return $this->hasMany('\App\Profile');
    }
}
