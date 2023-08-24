<?php

namespace App\Http\Controllers\Front\Unit;

use App\Models\Unit;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(Request $request,Unit $unit)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        // $comment_id = $request->comment_id;
        Comment::create([
            'body' => $request->body,
            'unit_id' => $unit->id,
            'user_id' => auth()->user()->id,
            // 'comment_id' => $comment_id,
            'read' => 1,
        ]);
        
        session()->flash('success', 'added successfully');
        return redirect()->back();
    }
}
