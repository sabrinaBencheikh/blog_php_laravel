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

    //ajouter un commentaire
    public function store(CommentRequest $request, $idPost){

      $post = Post::find($idPost);

      $comment = new Comment();
      $comment->body = request('body');
      $comment->user_id = auth()->user()->id;
      $comment->post_id = $post->id;
      $post->comments()->save($comment);

      return redirect()->route('article.show', $post->post_name);

    }

    //repondre a un commentaire
    public function storeReplyComment(Comment $comment){

      request()->validate([

            'replyComment' => 'required|min:2'
      ]);

      $replyComment = new Comment();
      $replyComment->body = request('replyComment');
      $replyComment->user_id = auth()->user()->id;
      $replyComment->post_id = $comment->post->id;
      
      $comment->comments()->save($replyComment);
      $post = $comment->post;

      return back();


    }



   //afficher la totalités des commentaire d'un post

    public function show(Post $post){

   //   $post = \App\Models\Post::where('post_name',$post_name)->first();

      $post->comments = Comment::where('post_id', $post->id)->paginate(7);
      return back();
    }



//mettre a jour un commentaire
    public function update(CommentRequest $request, Comment $comment){

         $post = $comment->post;
         $this->authorize('update', $comment);
         $comment->body = request('body');
         $comment->updated_at = now();
         $post->comments()->save($comment);
         //$comment->save();
      //   Comment::save($comment->id);

         return redirect()->route('article.show', $comment->post->post_name);
    }

    //modifier un commentaire
    public function edit($idComment){

         $comment = Comment::find($idComment);
         $this->authorize('update', $comment);
         $post = $comment->post;
         return view('posts.comment', ['post'=> $post, 'commentToEdit' =>  $comment]);
    }

    public function destroy(Comment $comment){

     // $comment = Comment::find($idComment);
      $this->authorize('delete', $comment);
      $comment->delete();
      $post = $comment->post;
      return redirect()->route('article.show', $post->post_name);
    }
}
