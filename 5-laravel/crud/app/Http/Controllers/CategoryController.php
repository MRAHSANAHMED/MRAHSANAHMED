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

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        return redirect()->back();
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('categories.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request,$category_id)
    {
        $request->validate([
            'cat_title' =>'required',
        ]);

           $category = Category::find($category_id);
            $category->update([
                'cat_title'=>$request->cat_title,

            ]);
            return redirect()->route('home');
    }



}
