<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('categories',[
            'categories' => $categories,
        ]);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'cat_title' =>'required',
        ]);
        Category::create([
            'cat_title' => $request->cat_title,
        ]);
        // return redirect()->back();
        return redirect()->route('home');
    }





}
