<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Psr\Log\NullLogger;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        $firstSkill = Skill::get();
        $firstSkill_edit = null;
        return view('admin.includes.skill.index',compact('firstSkill','firstSkill_edit'));

    }
    public function delete(Request $request,$id)
    {

        $firstSkill_delete = Skill::findOrFail($id);
        $firstSkill_delete->delete();
        return redirect()->route('skill_index');
    }
    public function skill_edit(Request $request, $id)
    {
        $firstSkill = Skill::get();
        $firstSkill_edit = Skill::findOrFail($id);
        // dd($firstSkill_edit);
        
        return view('admin.includes.skill.index',compact('firstSkill_edit','firstSkill'));
    }
    public function skill_update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            
        ]);
        $firstSkill = Skill::find($id);
        

        $imageName= $firstSkill->image;
        if($request->image){
            if($firstSkill->image){
                unlink($firstSkill->image);
            }
            $imageName = 'Firstskill-images/' . time() . '.' . $request->image->extension();
            // dd($imageName);
            $request->image->move(public_path('Firstskill-images'),$imageName);
        }
        $firstSkill->update([
            'title'=>$request->title,
            'image'=> $imageName,
        ]);
        return redirect()->route('skill_index');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required|unique:skills',
            
        ]);
        $imageName= Null;
        if($request->image){
            $imageName = 'Firstskill-images/' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('Firstskill-images'),$imageName);
        }
        Skill::create([
            'title'=>$request->title,
            'image'=> $imageName,
        ]);
        return redirect()->route('skill_index');
    }

    
   

}
