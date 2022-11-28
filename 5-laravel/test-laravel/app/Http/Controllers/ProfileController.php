<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::orderBy('id','desc')->with(['firstSkill','secondSkill'])->get();
        // dd($profile[0]->firstSkill->title,$profile[0]->secondSkill->title);
        return view('admin.includes.profile.index', compact('profile'));
    }
   
    public function delete(Request $request,$id)
    {
        $profile = Profile::findOrFail($id);
        // dd($id);
        $profile->delete();
        return redirect()->route('profile_index');
    }
   
    public function create(Request $request)
    {
        $profile = Profile::get();
        return view('admin.profile.create',compact('skill','skill2'));

    }
     // public function store()
    // {
    //     $profile = Profile::orderBy('id','desc');
    //     return view('admin.includes.profile.index', compact('profile'));
    // }
//     public function update()
//     {
//         $profile = Profile::orderBy('id','desc')->get();
//         return view('admin.includes.profile.index', compact('profile'));
//     }








}
