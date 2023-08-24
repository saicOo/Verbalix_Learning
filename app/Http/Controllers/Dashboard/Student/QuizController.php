<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuizController extends Controller
{
    
    public function index(User $user)
    {
        $student = $user;
        return view('dashboard.students.quizzes.index', compact('student'));
    }

}
