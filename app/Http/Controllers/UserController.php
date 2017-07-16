<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UserController extends Controller
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
    
    public function add(Request $request)
    {
        $user = new User;
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->api_token = str_random(60);
        $user->password = app('hash')->make($request['password']);
        
        $user->save();
        
        // $request['api_token'] = str_random(60);
        
        // $request['password'] = app('hash')->make($request['password']);
        
        // $user = User::create($request->all());
        
        return response()->json($user); 
    }
    
    
    public function editPost(Request $request, $id)
    {
        $user = User::find($id);
        
        $post = update($request->all());
        
        return response()->json($post);
        
    }
    
    public function viewPost($id)
    {
         $post = Post::find($id);
         
       return response()->json($post);
    }
    
    public function deletePost($id)
    {
         $post = Post::find($id);
         $post->delete();
         
         return response()->json('removed successfully..');
    }
    
    public function index()
    {
        $post = User::all();
        
        return response()->json($post);
    }
}