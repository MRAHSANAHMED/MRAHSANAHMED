<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $posts = Post::get();

        return view('home', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function post_detail($post_id)
    {
        //die and dump
        //dd($post_id);
        //Select * From posts where posts.post_id = $post_id
        $categories = Category::get();

        $post = Post::find($post_id);
        //dd($post);

        return view ('post_detail', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
}
