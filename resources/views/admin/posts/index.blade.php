@extends('layouts.admin')


@section('content')

<h1>SHOW POST TABLE</h1>

<a class="create_btn btn btn-info position-fixed bottom-0 end-0"
 href="{{route('admin.posts.create')}}" role="button">Create Post</a>

@include('partials.session_message')

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-info
    align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Cover</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">

                @forelse ($posts as $post)
                <tr class="table-info" >
                    <td scope="row">{{$post->id}}</td>
                    <td>
                        ('uploads', $request->cover_image);
                        <img height="100" src="{{ asset('storage/' - $post->cover_image) }}" alt="{{$post->title}}">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                        <a class="btn btn-prymary" href="{{route('admin.posts.show', $post->slug)}}"><i class="fas fa-eye fa-sm fa-fw"></i></a>
                        <a class="btn btn-secondary" href="{{route('admin.posts.edit', $post->slug)}}"><i class="fas fa-pencil fa-sm fa-fw"></i></a>
                   
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId-{{$post->id}}">
                          <i class="fas fa-trash fa-sm fa-fw"></i>
                        </button>
                        
                       
                        <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" 
                            role="dialog" aria-labelledby="modalTitleId-{{$post->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId-{{$post->id}}">Delete This post</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Body
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('admin.posts.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr class="table-info" >
                    <td scope="row">No POST</td>
                </tr>
                @endforelse
            </tbody>
            <tfoot>
            </tfoot>
    </table>
</div>

@endsection
<h1>INDEX</h1>


