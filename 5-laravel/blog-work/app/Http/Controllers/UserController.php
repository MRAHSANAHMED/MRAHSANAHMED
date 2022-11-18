<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;


class UserController extends Controller
{
    public function index()
        {
            $users = User::get();
            return view('admin.users.index',compact('users'));
        }

        public function delete(Request $request,$user_id)
        {
            $user = User::find($user_id);
            if(file_exists($user->user_image)){
                unlink($user->user_image);
            }
            $user->delete();
            return redirect()->route('user_index')->with('success','User Deleted Successfully');
        }

        public function user_create()
        {
            return view('admin.users.create');
        }

        public function user_store(Request $request)
        {
            $request->validate([
                'username' =>'required',
                'password' =>'required',
                'user_firstname' =>'required',
                'user_lastname' =>'required',
                'email' =>'required|email',
                'user_role' =>'required',
            ]);
            $imageName =null;
            if ($request->user_image){
                $imageName ='user_images/'. time() . '.' . $request->user_image->extension();
                $request->user_image->move(public_path('user_images'),$imageName);
            }
            User::create([
                "username" => $request->username,
                "user_firstname" => $request->user_firstname,
                "user_lastname" => $request->user_lastname,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "user_role" => $request->user_role,
                "user_image" => $imageName,
            ]);
            return redirect()->route('user_index')->with('success', 'user is created successfully');
        }

        public function edit(Request $request,$user_id)
        {
            $user = User::find($user_id);
            return view('admin.users.edit',compact('user'));
        }

        public function update(Request $request,$user_id)
        {
            $request->validate([
                'username' =>'required',
                'password' =>'required',
                'user_firstname' =>'required',
                'user_lastname' =>'required',
                'email' =>'required|email',
                'user_role' =>'required',
            ]);
            $user = User::find($user_id);
            $imageName = $user->user_image;
            if($request->user_image){
                if($imageName){
                    unlink($imageName);
                }
                $imageName = 'user_images/' . time() . '.' . $request->user_image->extension();
                $request->user_image->move(public_path('user_images'), $imageName);
            }

            $updatePassword = $user->password;
            if($request->password){
                $updatePassword = Hash::make($request->password);
            }
            $user->update([
                "username" => $request->username,
                "user_firstname" => $request->user_firstname,
                "user_lastname" => $request->user_lastname,
                "email" => $request->email,
                "password" => $updatePassword,
                "user_role" => $request->user_role,
                "user_image" => $imageName
            ]);
            return redirect()->route('user_index')->with('success','User is updated Successfully');

        }
        
    




}
