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

    public function comment_approve(Request $request,$comment_id)
    {
        // dd($request->all(),$comment_id);
        $comment = Comments::findOrFail($comment_id);
        $comment->update([
            'comment_status' =>'approved'
        ]);

        return redirect()->route('comment_index')->with('success','Comment Approved Successfully!');
    }

    public function comment_unapprove(Request $request,$comment_id)
    {
        // dd($request->all(),$comment_id);
        $comment = Comments::findOrFail($comment_id);
        $comment->update([
            'comment_status' =>'unapproved'
        ]);
        return redirect()->route('comment_index')->with('success','Comment Un-Approved Successfully!');

    }
    public function comment_delete(Request $request,$comment_id)
    {
        $comment = Comments::findOrFail($comment_id);
        $comment->delete();
        return redirect()->route('comment_index')->with('success','Comment id delete Successfully!');
    }








}
