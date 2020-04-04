<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    //
    function articles () {
        $posts = \App\Post::orderBy('post_date', 'desc')->get();
        return view ('articles', array('posts' => $posts))->with('page','articles');
    }
    
    public function show($post_name) {
        //get first post with post_nam == $post_name
        $post = \App\Post::where('post_name',$post_name)->first(); 
        $user = \App\User::find($post->user_id);
        //Pass the post to the view
        return view('posts/single')->with ('post', $post)
                                    ->with('page',"articles/{$post->post_name}")
                                    ->with('user', $user);
     }
     
}
