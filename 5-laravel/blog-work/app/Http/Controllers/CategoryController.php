<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(Request $request)
   {
    $categories = Category::get();
    $category_edit = null;
    return view('admin.categories', compact('categories','category_edit'));
   }


   public function store(Request $request)
   {
    $request->validate([
        'cat_title' => 'required|unique:categories',
    ]);
    $category = Category::create([
        'cat_title'=> $request->cat_title,

    ]);
     return redirect()-> route('category_index')-> with('success',"great");
   }

   public function category_delete(Request $request,$category_id)
   {
    $category = Category::findOrFail($category_id);
    $category->delete();
    return redirect()->route('category_index')->with('error',"deleted");
   }
   public function category_edit(Request $request, $category_id)
    {
        $category_edit = Category::findOrFail($category_id);

        return view('admin.categories', compact('category_edit'));
    }
   public function category_update(Request $request,$category_id)
   {
    $request->validate([
        'cat_title'=> 'required',
    ]);
    $category= Category::findOrFail($category_id);
    $category->update([
        'cat_title' =>$request->cat_title,
    ]);
    return redirect()->route('category_index')->with('success',"updated");

   }

}
