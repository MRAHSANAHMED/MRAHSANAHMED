<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comments::with('user','post')->get();
        // dd($comments->toArray());
        return view('admin.comments.index' , compact('comments'));

    }
}
