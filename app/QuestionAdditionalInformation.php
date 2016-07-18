<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAdditionalInformation extends Model
{
	//

    public function informationType(){
        return $this->belongsTo('\App\InformationType');
    }


}
