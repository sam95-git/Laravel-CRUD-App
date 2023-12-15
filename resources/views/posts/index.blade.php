@extends('layouts.app')

@section('content')
<div class="p-2 text-center bg-body-tertiary">
    <h1 class="mb-3">ALL POSTS</h1>
  </div>
@if(count($posts) > 0)
    @foreach($posts as $post)
    <div class="card mt-2">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <img class="img-fluid"src="/laravelapp/public/storage/cover_images/{{$post->cover_image}}" alt="cover image" style="max-width: 100%; height: auto">
        </div>
        <div class="col-md-8 col-sm-8">
            <h2><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></h2>
            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        </div>
    </div>
    </div>  
    @endforeach
        {{$posts->links()}}
@else
    <h2>No Posts</h2>
@endif
@endsection