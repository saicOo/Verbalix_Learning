<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\Unit;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    public function index(Unit $unit)
    {
        return view('dashboard.units.questions.index', compact('unit'));
    }

    public function store(Request $request,Unit $unit)
    {
        $request->validate([
            'title' => 'required|string|max:1000',
            'marks' => 'required|integer|max:100',
            'type' => 'required|in:1,2',
        ]);
        // if quiz activation done
        if ($unit->active_quiz == 1) return redirect()->back()->withErrors(["invalid" => "Can't be added"])->withInput();
        ##########################################################
        $question = $unit->question()->create([
            "title" => $request->title,
            "marks" => $request->marks,
            "type" => $request->type,
            "answer_option" => $request->answer_option,
        ]);


            foreach ($request->options as $index => $title) {
                $question->option()->create([
                    'title' => $title,
                    'option_num' => $index + 1,
                ]);
            }

        session()->flash('success', 'added successfully');
        return redirect()->back();
    }


}
