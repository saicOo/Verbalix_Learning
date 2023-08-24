<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('success', 'deleted successfully');
        return redirect()->back();
    }
}
