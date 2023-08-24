<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(Request $request)
    {
        $students = User::where('role','Student')->when($request->parent_id,function ($query) use ($request){
            return $query->where('user_id',$request->parent_id);
        })->latest()->paginate(10);
        return view('dashboard.students.index', compact('students'));
    }

    public function update(Request $request, User $user)
    {

        $inputCheck = false;
        if (isset($request->active)) {
            $inputCheck = true;
        }

        $user->update([
            'active' => $inputCheck,
        ]);

        session()->flash('success', 'updated successfully');
        return redirect()->back();
    }

}
