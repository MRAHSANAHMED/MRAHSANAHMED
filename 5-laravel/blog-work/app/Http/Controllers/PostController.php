<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index(Request $request)
  {
    $posts = Post::orderBy('post_id','desc')->get();
    return view('admin.posts.index',compact('posts'));
  }
}
