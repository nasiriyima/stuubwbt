<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function scopePublishedNews($query){
        return $query->where('status', '=', '1')->get();
    }
}
