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

    public function questionAdditionalInformation(){
        return $this->belongsTo('\App\QuestionAdditionalInformation');
    }

    public function getQuestionAdditionalInformationIdAttribute($value){
        if($value)
            return TRUE;
        FALSE;
    }
}
