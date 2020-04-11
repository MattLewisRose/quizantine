<?php

namespace Quizantine\Core;

use Illuminate\Database\Eloquent\Model;
use Quizantine\Core\Quiz;

class Round extends Model
{
    protected $table = 'rounds';


    public function quiz()
    {
        return $this->belongsTo('Quizantine\Core\Quiz');
    }
}
