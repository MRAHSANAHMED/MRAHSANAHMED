<?php

namespace App\Http\Controllers;

use App\Models\Skill2;
use Illuminate\Http\Request;

class Skill2Controller extends Controller
{
    public function index(Request $request)
    {
        $secondSkill = Skill2::get();
        $secondSkill_edit = null;
        return view('admin.includes.skill2.index',compact('secondSkill','secondSkill_edit'));

    }
    public function delete(Request $request,$id)
    {

        $secondSkill_delete = Skill2::findOrFail($id);
        $secondSkill_delete->delete();
        return redirect()->route('skill2_index');
    }
    public function skill2_edit(Request $request, $id)
    {
        $secondSkill = Skill2::get();
        $secondSkill_edit = Skill2::findOrFail($id);
        // dd($secondSkill_edit);
        
        return view('admin.includes.skill2.index',compact('secondSkill_edit','secondSkill'));
    }
    public function skill2_update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            
        ]);
        $secondSkill = Skill2::find($id);
        

        $imageName= $secondSkill->image;
        if($request->image){
            if($secondSkill->image){
                unlink($secondSkill->image);
            }
            $imageName = 'secondskill-images/' . time() . '.' . $request->image->extension();
            // dd($imageName);
            $request->image->move(public_path('secondskill-images'),$imageName);
        }
        $secondSkill->update([
            'title'=>$request->title,
            'image'=> $imageName,
        ]);
        return redirect()->route('skill2_index');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|unique:skills',
            
        ]);
        $imageName= Null;
        if($request->image){
            $imageName = 'secondskill-images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('secondskill-images'),$imageName);
        }
        Skill2::create([
            'title'=>$request->title,
            'image'=> $imageName,
        ]);
        return redirect()->route('skill2_index');
    }
}
