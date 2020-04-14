<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;


class CommentController extends Controller
{
   public function __construct(){

        $this->middleware('auth')->except('show');
    }

    
    public function store(CommentRequest $request, $idPost){

      $post = Post::find($idPost);

      $comment = new Comment();
      $comment->body = request('body');
      $comment->user_id = auth()->user()->id;
      $comment->post_id = $post->id;
      $post->comments()->save($comment);

      return redirect()->route('article.show', $post->post_name);

    }



   //afficher la totalités des commentaire d'un post

    public function show(Post $post){

   //   $post = \App\Models\Post::where('post_name',$post_name)->first();

      $post->comments = Comment::where('post_id', $post->id)->paginate(7);
      return back();
    }


    public function update(CommentRequest $request, Comment $comment){

        // $comment = Comment::find($idComment);
         $this->authorize('update', $comment);
         $comment->body = request('body');
         //$post->comment->save();
         $comment->save();

         return redirect()->route('article.show', $comment->post->post_name);
    }

    public function edit(Comment $comment){

        // $comment = Comment::find($idComment);
         $this->authorize('update', $comment);
         $post = $comment->post;
         return view('posts.comment', ['post'=> $post, 'commentToEdit', $comment]);
    }

    public function destroy(Comment $comment){

     // $comment = Comment::find($idComment);
      $this->authorize('update', $comment);
      $comment->delete();
      $post = $comment->post;
      return redirect()->route('article.show', $post->post_name);
    }
}
