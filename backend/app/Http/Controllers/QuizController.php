<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Quizantine\Core\Quiz;
use Quizantine\Utility\Returnable;
use Cache;

class QuizController extends Controller
{
    use Returnable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Quiz::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = new Quiz([
            'name' => $request->quiz->name,
            'person_id' => $request->quiz->person
        ]);

        $quiz->save();

        return $quiz;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(cache::has('quiz_' . $id)) {
            $quiz = Cache::get('quiz_' . $id);
        } else {
            $quiz = Quiz::findOrFail($id);
        }

        return $quiz;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        $quiz->name = $request->quiz->name;
        $quiz->person_id = $request->quiz->person_id;

        if($quiz->save()) {
            return $this->retSuccess();
        }

        return $this->retError('Error updating quiz');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);

        if($quiz->delete()) {
            return $this->retSuccess();
        }
        return $this->retError('Error deleting the quiz');
    }
}
