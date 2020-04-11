<?php

namespace Quizantine\Core;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public function user()
    {
        return $this->belongsTo('Quizantine\Core\Round');
    }
}
