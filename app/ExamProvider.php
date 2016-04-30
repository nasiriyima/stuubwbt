<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamProvider extends Model
{
    //
    public function question(){
        return $this->hasMany('\App\Question');
    }
}
