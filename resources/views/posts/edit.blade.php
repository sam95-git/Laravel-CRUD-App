@extends('layouts.app')

@section('content')
<h1>Update Post</h1>
<form action="/laravelapp/public/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" name="body" id="body">{{$post->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="cover_image">Upload Image</label>
        <input type="file" name="cover_image" id="cover_image" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection