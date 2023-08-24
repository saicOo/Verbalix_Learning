<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Unit;
use App\Models\User;
use App\Models\Admin;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $levelsCount = Level::count();
        $unitsCount = Unit::count();
        $studentsCount = User::count();
        $adminsCount = Admin::count();
        return view('dashboard.home',compact('levelsCount','unitsCount','studentsCount','adminsCount'));
    }
    
}
