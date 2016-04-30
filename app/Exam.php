<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    public function subject(){
        return $this->belongsTo('\App\Subject');
    }
    
    public function month(){
        return $this->belongsTo('\App\Month');
    }

    public function session(){
        return $this->belongsTo('\App\Session');
    }
    
    public function examProvider(){
        return $this->belongsTo('\App\ExamProvider');
    }
    
    public function instruction(){
        return $this->belongsTo('\App\Instruction');
    }
    
    public function question(){
        return $this->hasMany('\App\Question');
    }
}
