<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('posts.index',['allPosts' => $posts]);
    }
    public function show($id){
        $post = Post::find($id);
       // \Log::debug($id);
       return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
    
        $data = [
            'title' => $request->title,
            'content'=> $request->content
        ];




        Post::create($data);
        return redirect('/posts');
    }
}
