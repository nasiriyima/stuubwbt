<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemPreference extends Model
{
    //
     public function scopeSystemSettings($query, $type)
    {
        return $query->where('name','=',$type)->first();
    }
}
