<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        //SELECT * from posts LEFT JOIN categories on posts.post_category_id = categories.cat_id where post_category_id = $cat_id

        $posts = Category::with('posts', 'posts.category')->find($category_id)->posts;

        // dd($posts);
        return view('category_detail', compact('posts'));
    }

    public function post_search(Request $request)
    {
        $custom_search_value ="%$request->custom_search_value%";
        $posts= Post::with('category')->where('post_title', 'LIKE', $custom_search_value)->get();
        return view('serach', compact('posts'));
    }
    public function register()
        {
            return view('register');
        }

    public function register_user(Request $request)
    {
        $request->validate([
            'username' =>'required',
            'user_password' =>'required',
            'user_firstname' => 'required',
            'user_lastname' => 'required',
            'email' => 'required',
        ]);
        dd($request);
        $user = User::create([
            'username' =>$request->username,
            'user_password' => Hash::make($request->password),
            'user_firstname' =>$request->user_firstname,
            'user_lastname' =>$request->user_lastname,
            'email' =>$request->email,
            'user_image' => null,
            'user_role' =>"Admin",
        ]);
        // dd($user);
        return redirect()->back()->with('success','User is Registered Successfully');
    }
    public function login()
    {
        return view('login');
    }
    public function login_post(Request $request)
        {
            $request->validate([
                'email' => 'email',
                'password' => 'required',
            ]);

            try{
                $credentials = $request->only('email', 'password');
                if(Auth::attempt($credentials)) {
                    dd('you are logged in');

                }else{
                    return redirect()->to('/login')->with('error','User email or password is wrong.');
                }
            }catch (\Throwable $th){
            return redirect()->to ('login')->with('error','something went wrong');

            }
        }



}
