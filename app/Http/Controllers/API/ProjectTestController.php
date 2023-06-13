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
        $posts = Post::orderByDesc('id')->get();
        return response()->json([
        'success' => true,
        'posts' =>  $posts,
    ]);
    }
}
// http://127.0.0.1:8000/api/posts -- chiamata API tramite Postman + dati rivevuti --