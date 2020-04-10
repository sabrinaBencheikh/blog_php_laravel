<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
   public function __construct(){

        $this->middleware('auth')->except('show');
    }
    
    public function store(Post $post){

      $comment = new Comment();
      $comment->body = request('body');
      $comment->user_id = auth()->user()->id;
      $comment->post_id = $post->id;
      $comment->save();

      return back();

    }



 //afficher la totalités des commentaire d'un post
    public function show($post_name){

      $post = \App\Models\Post::where('post_name',$post_name)->first();

      $post->comments = \App\Models\Comment::where ('post_id', $post->id)->latest()->paginate(10);

      return view('posts/comments',compact('post', $post));
    }
}
