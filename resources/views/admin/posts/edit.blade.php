@extends('layouts.admin')

@section('content')

<h1 class="display-2 py-3">Edit {{$post->title}}</h1>

@include('partials.validation_errors')

<form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="title" class="form-label"><strong>Title</strong></label>
    <input type="text"
        class="form-control @error('title') is-invalid @enderror" name="title" 
        id="title" aria-describedby="titlehelpId" 
        placeholder="Learn php" value="{{ old('title', $post->title) }}">
    <small id="titlehelpId" class="form-text text-muted">
        Type the post title max 150 characters - must be unique</small>
    </div>


    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach ($categories as $category)
            <option value="{{$category?->id}}"  {{$category?->id == old('category_id',
            $post->categoty?->id) ? 'selected' : '' }}>{{$category?->name}}</option>
            
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <p>Selezona le Tecnologie:</p>
        @foreach (technologies as technology )
        <div class="form-check @error('technologies') is-invalid @enderror">
            <label class="form-check-label">        
                @if($error->any())
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input" {{ in_array ($technology->id, old('technologies',
                [])) ? 'checked' : '' }}> 
                @else
                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" class="form-check-input" {{ $post->technologies->contains($technologies) ?
                'checked' : '' }}>  
                 @endif  
            </label> 
            {{ technology->name }}
        </div>
        @endforeach
        @error('technologies')
        <div class="invalid-feedback">{{ $message}}</div>
        @enderror
    </div>
    

 

    <div class="d-flex">
        <img with="100" src="{{asset('storage/' . $post->cover_image)}}" alt="">

        <div class="mb-3">
            <label for="cover_image" class="form-label"><strong>Replace Image</strong> </label>
            <input type="file"
            class="form-control @error('cover_image') is-invalid @enderror"
             name="cover_image" id="cover_image" aria-describedby="cover_imagehelpId" placeholder="Learn php">
            <small id="cover_imagehelpId" class="form-text text-muted">Type the post cover_image max 950k </small>
        </div>
    </div>

   <div class="mb-3">
     <label for="content" class="form-label"><strong>Content</strong> </label>
     <textarea class="form-control @error('content') is-invalid @enderror" name="content" 
     id="content" rows="3">{{ old('content', $post->content) }}</textarea>
   </div>

   <button type="submit" class="btn btn-primary">Update</button>
@endsection

<h1>EDIT</h1>