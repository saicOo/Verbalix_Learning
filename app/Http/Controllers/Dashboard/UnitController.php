<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Unit;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UnitController extends Controller
{

    public function index()
    {
        $levels = Level::all();
        $units = Unit::latest()->paginate(10);
        return view('dashboard.units.index', compact('units','levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:50',Rule::unique('units')->where(function ($query) use($request) {
                return $query->where('name', $request->name)
                ->where('level_id', $request->level_id)->where('semester', $request->semester);
            })],
            'description' => 'required|max:1000',
            'video' => 'required|mimes:mp4|max:2048',
            'attached' => 'required|file|max:2048',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'level_id' => 'required|exists:levels,id',
            'semester' => 'required|in:Semester 1,Semester 2',
        ]);

        $request_data = $request->except(['video','attached']);

        ######## START Uploads files #########
        $upload_path = 'level '.$request->level_id.'/'.$request->semester.'/'.$request->name;
        $path_video = $request->file('video')->store($upload_path,['disk' => 'my_files']);
        $path_attached = $request->file('attached')->store($upload_path,['disk' => 'my_files']);
        $path_image = $request->file('image')->store($upload_path,['disk' => 'my_files']);
        $request_data['video'] = $path_video;
        $request_data['attached'] = $path_attached;
        $request_data['image'] = $path_image;
        ######## END Uploads files #########

        Unit::create($request_data);
        session()->flash('success', 'added successfully');
        return redirect()->back();
    }

    public function update(Request $request, Unit $unit)
    {
        if (isset($request->active_quiz)) {

            if($unit->questions->count() == 0)
            return redirect()->back()->withErrors(["invalid" => 'Cannot be activated'])->withInput();

            $unit->update([
                'active_quiz' => true,
            ]);
            
            session()->flash('success', 'the quiz activated successfully');
            return redirect()->back();
        }

        return redirect()->back()->withErrors(["invalid" => 'Activation cannot be deactivated'])->withInput();
    }

    public function destroy(Unit $unit)
    {
        Storage::disk('my_files')->delete($unit->video);
        Storage::disk('my_files')->delete($unit->attached);
        Storage::disk('my_files')->delete($unit->image);
        $unit->delete();
        session()->flash('success', 'deleted successfully');
        return redirect()->back();
    }
}
