<?php

namespace App\Http\Controllers\Front\Unit;

use App\Models\Quiz;
use App\Models\Unit;
use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Unit $unit)
    {
        return view('front.units.quizzes.index', compact('unit'));
    }


    public function store(Request $request,Unit $unit)
    {
        $quiz = Quiz::create([
            'user_id' => auth()->user()->id,
            'unit_id' => $unit->id,
        ]);

        $total_marks = 0;

        foreach ($unit->questions as $index => $question) {
            $question_id = $question->id;
            $answar =  "No Answer";
            $marks = '0';

            if(isset($request->option[$question_id])){
                $option = Option::find($request->option[$question_id]);
                $marks = $question->answer_option == $option->option_num ? $question->marks : '0';
                $answar = $option->title;
            }

            $quiz->questions()->attach($question_id,[
                'marks' => $marks,
                'answer' => $answar,
            ]);

            $total_marks += $marks;
        }

        if($total_marks >= ($unit->questions->sum('marks') / 2)){
            $quiz->update([
                'done' => 1
            ]);
        }

        session()->flash('done_quiz');
            return redirect()->route('grades.index');
    }

}
