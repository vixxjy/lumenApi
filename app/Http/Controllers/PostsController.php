<?php

namespace App\Http\Controllers\controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function index()
    {
        $post = Post::all();
        
        return response()->json($post); 
    }
    
    public function createPost(Request $request){
        $post = Post::create($request->all());
        return response()->json($post);
    }
    
    
    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->views = $request->input('views');
        $post->save();
        
        return response()->json($post);
        
    }
    
    public function deletePost($id)
    {
         $post = Post::find($id);
         $post->delete();
         
         return response()->json('removed successfully..');
    }
}