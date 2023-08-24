<?php

namespace App\Http\Controllers\Front;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('front.grades.index');
    }

    public function show(Quiz $quiz)
    {
        return view('front.grades.show', compact('quiz'));
    }
}
