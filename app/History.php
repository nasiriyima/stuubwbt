<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //
    public function exam(){
        return $this->belongsTo('\App\Exam');
    }
    
    public function user(){
        return $this->belongsTo('\App\User');
    }

    public function scopeLeadersBoard($query, $startDate, $endDate){
        return $query->whereBetween('histories.created_at', [$startDate,$endDate])
                     ->selectRaw('histories.*, SUM(histories.score) AS score')
                     ->orderBy('score', 'desc');
    }

    public function scopeAttempts($query, $startDate, $endDate){
        return $query->whereBetween('created_at', [$startDate,$endDate])
                     ->orderBy('created_at','asc');
    }
}
