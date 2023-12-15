@extends('layouts.app')

@section('content')
<div>
    <a href="/laravelapp/public/posts" class="btn btn-secondary">Go Back</a>
</div>
<div class="card mt-2">
    <div class="card-body">
            <img class="img-fluid"src="/laravelapp/public/storage/cover_images/{{$post->cover_image}}" alt="cover image" style="max-width: 100%; height: auto">
        <div class="card-title">
        <h1>{{$post->title}}</h1>
        <p>{{$post->body}}</p>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        </div>
    </div>
</div>
@if(!auth::guest())
    @if(auth::user()->id == $post->user->id)
        <div class="d-flex">
            <div class="p-2">
                <a class="btn btn-primary btn-sm active" href="/laravelapp/public/posts/{{$post->id}}/edit">Edit</a>
            </div>
            <div class="p-2">
                <form action="/laravelapp/public/posts/{{$post->id}}" method="POST">
                    @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm active" type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endif
@endif
@endsection