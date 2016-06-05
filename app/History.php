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
        return $query->selectRaw('*, SUM(score) as score')->whereBetween('created_at',[
            $startDate, $endDate
        ])->groupBy('user_id')->orderBy('score','dsc');
    }

    public function scopeAttempts($query, $startDate, $endDate){
        return $query->whereBetween('created_at', [$startDate,$endDate])
                     ->orderBy('created_at','asc');
    }

    public function  scopeExamAttempts($query, $exam_id, $startDate, $endDate){
        return $query->where([
            'exam_id' => $exam_id
        ])->whereBetween('created_at', [$startDate,$endDate]);
    }

    public function scopeCumulativeAverage($query, $exam_id, $startDate, $endDate){
        $total = 0.0;
        $count = 0;
        $histories = $query->where([
            'exam_id' => $exam_id
        ])->whereBetween('created_at', [$startDate,$endDate])->get();
        foreach($histories as $history){
            $total = (double)($total + $history->score);
            $count++;
        }
        $average = (double) ($total / $count);
        return $average;
    }

    public function scopeExamAttemptAll($query, $exam_id){
        return $query->where([
            'exam_id' => $exam_id
        ]);
    }
}
