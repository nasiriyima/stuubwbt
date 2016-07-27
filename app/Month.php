<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = ['code', 'name', 'exam_provider_id'];

    public function examProvider(){
        return $this->belongsTo('\App\ExamProvider');
    }
}
