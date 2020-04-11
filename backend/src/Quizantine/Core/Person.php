<?php

namespace Quizantine\Core;

use Illuminate\Database\Eloquent\Model;
use Quizantine\Core\Quiz;

class Person extends Model
{
    protected $table = 'people';

    public function quiz() {
        return $this->belongsTo('Quizantine\Core\Quiz');
    }

    public function checkPlayer($id, $cookie_key) {
        $player = this::where([['id', '=', $id],['cookie_key', '=' , $cookie_key]])->count();

        if($player == 1) {
            return true;
        }

        return false;
    }

    public function logInteraction($id) {
        thisDB::update('update pe set votes = 100 where name = ?', ['John']);
    }
}
