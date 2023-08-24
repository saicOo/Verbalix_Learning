<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{

    public function show(Quiz $quiz)
    {
        return view('dashboard.students.quizzes.show', compact('quiz'));
    }

}
