<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Skill2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $skills = Skill::get();
        $skills2 = Skill2::get();
        return view('admin.includes.profile.create',compact('skills','skills2'));

    }
     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'image' => 'required',
            'skill' => 'required',
            'skill2' => 'required',
            'role' => 'required',
            'content' => 'required',
        ]);
        $imageName= Null;
        if($request->image){
            $imageName= 'profile-images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile-images'),$imageName);
        }
        Profile::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'contact' => $request->contact,
            'email' => $request->email,
            'image' => $imageName,
            'skill' => $request->skill,
            'skill2' => $request->skill2,
            'role' => $request->role,
            'content' => $request->content,
        ]);
        return redirect()->route('profile_index');

    }
    public function edit(Request $request,$id)
    {
        $profile = Profile::find($id);
        return view('admin.includes.profile.edit', compact('profile'));
    }
     public function update(Request $request,$id)
    {
        // dd($request->all());

        $request->validate([
    'name' => 'required',
    'contact' => 'required',
    'email' => 'required|email',
    'skill' => 'required',
    'skill2' => 'required',
    'role' => 'required',
    'content' => 'required',
        ]);

        $profile = Profile::find($id);

        $imageName= $profile->image;
            if ($request->image){
                if($profile->image){

                unlink($profile->image);
            }
            $imageName= 'profile-images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('profile-images'),$imageName);
        }
        $newpassword = $profile->password;
        if($request->password){
            $newpassword = Hash::make($request->password);
        
        }
        $profile->update([
            'name' => $request->name,
            'password' => $newpassword,
            'contact' => $request->contact,
            'email' => $request->email,
            'image' => $imageName,
            'skill' => $request->skill,
            'skill2' => $request->skill2,
            'role' => $request->role,
            'content' => $request->content,
        ]);

        return redirect()->route('profile_index');

    }








}
