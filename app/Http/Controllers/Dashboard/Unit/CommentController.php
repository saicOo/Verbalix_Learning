<?php

namespace App\Http\Controllers\Dashboard\Unit;

use App\Models\Unit;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function index(Unit $unit)
    {
        $unit->comments()->update([
            'read' => 0, // read comments
        ]);
        return view('dashboard.units.comments.index', compact('unit'));
    }

    public function store(Request $request,Unit $unit)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $comment_id = $request->comment_id;
        Comment::create([
            'body' => $request->body,
            'unit_id' => $unit->id,
            'admin_id' => auth()->user()->id,
            'comment_id' => $comment_id,
        ]);
        return redirect()->back();
    }

}
