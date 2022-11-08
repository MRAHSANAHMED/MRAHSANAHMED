<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
  public function index(Request $request)
  {
    $posts = Post::orderBy('post_id','desc')->get();
    return view('admin.posts.index',compact('posts'));
  }
  public function delete(Request $request,$post_id)
  {
    $post =Post::findOrFail($post_id);

    $post->delete();
    return redirect()->route('post_index')->with('error','deleted');
  }
  public function create(Request $request)
  {
    $categories = Category::get();
    return view('admin.posts.create',compact('categories'));

  }
  public function store(Request $request)
  {
    $request->validate([
        'post_title' =>'required',
        'post_category_id' =>'required',
        'post_author' =>'required',
        'post_date' =>'required',
        'post_status' =>'required',
        'post_content' =>'required',

    ]);

    $imageName = null;
    if ($request->post_image){
        $imageName = 'post_imageS/' . time() . '.' . $request->post_image->extension();
        $request->post_image->move(public_path('post_images'),$imageName);
    }
    Post::create([
        'post_title' =>$request->post_title,
        'post_category_id' =>$request->post_category_id,
        'slug' => Str::slug($request->post_title),
        'post_author' =>$request->post_author,
        'post_date' =>$request->post_date,
        'post_status' =>$request->post_status,
        'post_content' =>$request->post_content,
        'post_image' =>$imageName,
    ]);
    return redirect()->route('post_index')->with('success','post created');
  }






}
