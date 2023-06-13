<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tecnology;
use Illuminate\Contacts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Auth::user()->posts()->orderByDesc('id')->paginate(8);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderByDesc('id')->get();
        $technologies = Tecnology::orderByDesc('id')->get();

        return view('admin.posts.create', compact('categories','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //validate request
        $val_data = $request->validate();
        // generate the title slug
        $slug = Post::generateSlug($val_data['title']);
        
        $val_data['slug'] = $slug;

        $val_data['user_id'] = Auth::id();

        if($request->hasFile('cover_image')){
            $image_path = Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $image_path;

        }



        // create the new post
        $new_post = Post::create($val_data);
        // redirect back
        
        // Attach the checked tags
        if ($request->has('technologies')) {
            $new_post->technologies()->attach($request->technologies);
        }
        // redirect to_route
        return to_route('admin.posts.index')->with('message', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderByDesc('id')->get();
        $technologies = Technology::orderByDesc('id')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $val_data = $request->validate();

        $slug = Post::generateSlug($val_data['title']);

        $val_data['slug'] = $slug;




        if($request->hasFile('cover_image')){

            if($post->cover_image){
                Storage::delete($post->cover_image);
            }

            $image_path = Storage::put('uploads', $request->cover_image);

            $val_data['cover_image'] = $image_path;
        }





        $post->update($val_data);

        if ($request->has('technologies')) {
            $post->technologies()->sync($request->technologies);
        }
        
        return to_route('admin.posts.index')->with('message', 'Post:' . $post->title . 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->cover_image){
            Storage::delete($post->cover_image);
        }

        $post->delete();
        return to_route('admin.posts.index')->with('message', 'Post:' . $post->title . 'Deleted');
    }
}
