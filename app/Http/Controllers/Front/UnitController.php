<?php

namespace App\Http\Controllers\Front;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $units = Unit::where('semester',$request->semester)->where('level_id',$request->level_id)->get();
        return view('front.units.index', compact('units'));
    }

    public function show(Unit $unit)
    {
        return view('front.units.show', compact('unit'));
    }

    public function download(Unit $unit)
    {
        $fileName = $unit->level->name .'-'. $unit->semester .'-'. $unit->name.'.pdf';
        $headers = array(
            'Content-Type: application/pdf',
        );

        return Storage::disk('my_files')->download($unit->attached,$fileName, $headers);
    }


}
