<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    public function index()
    {
        $levels = Level::all();
        return view('dashboard.levels.index', compact('levels'));
    }

}
