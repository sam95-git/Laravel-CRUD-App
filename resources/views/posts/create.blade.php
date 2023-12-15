@extends('layouts.app')

@section('content')
<h1>Create Post</h1>
<form action={{route('posts.store')}} method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control" name="body" id="body"></textarea>
    </div>
    <div class="form-group">
        <label for="cover_image">Upload Image</label>
        <input type="file" name="cover_image" id="cover_image" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection