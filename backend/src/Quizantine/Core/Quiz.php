<?php

namespace Quizantine\Core;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizes';

    protected $fillable = [
        'name',
        'person_id'
    ];


    public function rounds()
    {
        return $this->hasMany('Quizantine\Core\Round');
    }

    public function owner()
    {
        return $this->belongsTo('Quizantine\Core\Person');
    }
}
