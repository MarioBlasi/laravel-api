<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PageController extends Controller


{
    public function index(){
        $postList = Post::all();
        return view('home', compact('postList'));
        // return view('admin.dashboard');
    }
    
    // public function welcome(){
    //     return view('welcome');
    // }
    // public function contact(){
    //     return view('contact');
    // }
}

