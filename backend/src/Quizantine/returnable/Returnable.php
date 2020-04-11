<?php

namespace Quizantine\Utility;

use Illuminate\Database\Eloquent\Model;
use Quizantine\Core\Quiz;

class Returnable {


    public function retSuccess() {
        return ['status' => true];
    }


    public function retError($message) {
        return [
            'status' => false,
            'message' => $message
        ];
    }
}
