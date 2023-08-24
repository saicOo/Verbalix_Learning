<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    public function index(Request $request)
    {
        $admins = Admin::whereNotIn('id',[1])->latest()->paginate(10);
        $levels = Level::all();
        return view('dashboard.admins.index', compact('admins','levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8','max:20', 'confirmed'],
        ]);
        $request_data = $request->except(['password','password_confirmation']);
        $request_data['password'] = bcrypt($request->password);
        $admin = Admin::create($request_data);
        session()->flash('success', 'added successfully');
        return redirect()->back();
    }


    public function destroy(Admin $admin)
    {
        $admin->delete();
        session()->flash('success', 'deleted successfully');
        return redirect()->back();
    }
}
