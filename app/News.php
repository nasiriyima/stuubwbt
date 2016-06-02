<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopePublishedNews($query){
        return $query->where('status', '=', '1')->get();
    }
}
