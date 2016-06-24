<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    //

    protected $casts = [
        'options' => 'array',
    ];

    public function user(){
        return $this->belongsTo('\App\User');
    }
}
