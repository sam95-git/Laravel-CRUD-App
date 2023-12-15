@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="p-2 text-center bg-body-tertiary">
                <div class="card-header">{{ __('DASHBOARD') }}</div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
                    <br>
                    <a class="btn btn-primary" href="{{route('posts.create')}}">Create Post</a>
                @if(!empty($posts))
                    @if(count($posts) > 0)
                    <div class="container mt-2">
                        <div class="p-2 text-center bg-body-tertiary">
                        <h3>MY POSTS</h3>
                        </div>
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a></td>
                                <td>
                                    <form action="posts/{{$post->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button value="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                    @else
                    <p>You have no posts!!</p>
                    @endif
                    
                    {{-- <h1>Your Posts</h1> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
