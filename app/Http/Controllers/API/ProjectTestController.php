<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Post;

use Illuminate\Http\Request;

class ProjectTestController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::with(['category', 'technologies', 'user'])->orderByDesc('id')->get(6);

        return response()->json([
        'success' => true,
        'posts' =>  $posts,
    ]);
    }

    public function show($slug){
        $post = Post::with(['category', 'technology', 'user'])->where('slug',$slug)->first();
        dd($post);

        if($post){

            return response()->json([
                'success'=> true,
                'post' => $post
            ]);
        }
        else{
            return response()->json([
                'success'=> false,
                'post' => 'Post not found 404',
            ]);
        }
    }
}
// http://127.0.0.1:8000/api/posts -- chiamata API tramite Postman + dati rivevuti --