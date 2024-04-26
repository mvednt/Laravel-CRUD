<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return response()->json([
            'posts'=>Post::get()
        ]);
    }


    public function store(Request $request)
    {
        $post = new Post;
        $post->title=$request->title;
        $post->description=$request->description;

        $post->save();

        return response()->json([
            'message' =>'Post Created',
            'status' =>'success',
            'data' => $post
        ]);
    }


    public function show(Post $post)
    {
        return response()->json(['post'=>$post]);
    }


    public function update(Request $request, Post $post)
    {
        $post->title=$request->title;
        $post->description=$request->description;

        $post->save();

        return response()->json([
            'message' =>'Post Updated',
            'status' =>'success',
            'data' => $post
        ]); 
    }


    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json([
            'message'=>'Post Deleted',
            'status'=>'Success'
        ]);
    }
}
