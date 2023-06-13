@extends('layouts.admin')


@section('content')


<div class="rounded shadow py-5">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col">
            <img class="img-fluid" src="{{asset('storage/' . $post->cover_image)}}" alt="{{$post->title}}">
        </div>
       
        <div class="col">
            <div class="content">
                <h2>{{$post->title}}</h2>
                <div class="meta">
                    <span class="badge bg-primary">{{$post->category?->name}}</span>
                </div>
            </div>
            <p>{{$post->content}}</p>
        </div>
    </div>

</div>
   
@endsection


<h1>SHOW</h1>