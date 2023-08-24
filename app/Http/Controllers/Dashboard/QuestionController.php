<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{

    public function destroy(Question $question)
    {
        // if quiz activation 
        if ($question->unit->active_quiz == 1) return redirect()->back()->withErrors(["invalid" => 'Cannot delete'])->withInput();
        ###################################################
        $question->delete();
        session()->flash('success', 'deleted successfully');
        return redirect()->back();
    }

}

