<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct(){
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //using SQL query with DB library
        // $posts = DB::select('SELECT * FROM posts');
        //using eloquent ORM 
        // $posts = Post::all(); //ftech all
        // $posts = Post::where('title', 'post two title')->get(); //where clause
        // $posts = Post::orderBy('title', 'desc')->limit(1)->get(); //using order by n limit
        // $posts = Post::orderBy('title', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        // return $posts;
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        //handle image file
        if($request->hasFile('cover_image')){
            $fileNameExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.png';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect(route('posts.index'))->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $post = Post::find($id);
        //to prevent direct url access check for user
        if(auth()->user()->id !== $post->user_id){
            return redirect(route('posts.index'))->with('error', 'unauthorized page!');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,
        [
            'title' => 'required',
            'body'=> 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //handle image file
        if($request->hasFile('cover_image')){
            $fileNameExt = $request->file('cover_image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect(route('posts.index'))->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        //to prevent direct url access check for user
        if(auth()->user()->id !== $post->user_id){
            return redirect(route('posts.index'))->with('error', 'unauthorized page!');
        }
        if($post->cover_image != 'noimage.png'){
            Storage::delete('public/storage/cover_images'.$post->cover_image);
        }
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post Deleted');
    }
}
