<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('home',['posts'=>$posts,]);
    }

    public function post_detail($post_id){
        // dd($post_id);

        $post = Post::with('category')->find($post_id);
        return view('post_detail',['posts'=> $post,]);

    }
    public function category_detail($category_id)
    {
        $posts = Category::with('posts','posts.category')->find($category_id)->posts;
        return view('category_detail', compact('posts'));
    }

    public function post_search(Request $request)
    {
        $custom_search_value ="%$request->custom_search_value%";
        $posts= Post::with('category')->where('post_title', 'LIKE', $custom_search_value)->get();
        return view('serach', compact('posts'));
    }


}
