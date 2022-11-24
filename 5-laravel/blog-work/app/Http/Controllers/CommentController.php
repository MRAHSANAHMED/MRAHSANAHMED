<?php

namespace App\Http\Controllers;
use DateTime;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        public function comment_store(Request $request,$post_id)
        {
            $data = $request->validate([
                'comment_content' => 'required'
            ]);
            // dd($data);
            $user_id = Auth::id();
            // dd($user_id);
            Comments::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'comment_content' => $request->comment_content,
                'comment_status' => 'unapproved',
                
             ]);
             return redirect()->back()->with('success','comment added');
        }








}
