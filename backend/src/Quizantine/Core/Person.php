<?php

namespace Quizantine\Core;

use Illuminate\Database\Eloquent\Model;
use Quizantine\Core\Quiz;

class Person extends Model
{
    //

    public function quiz() {
        return $this->belongsTo('Quizantine\Core\Quiz');
    }


}
