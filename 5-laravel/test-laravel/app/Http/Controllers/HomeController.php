<?php

namespace App\Http\Controllers;

use App\Models\profiles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = profiles::get();
        return view('welcome',['profiles' => $profile,]);
    }




}
