<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index () {
        $posts = \App\Post::orderBy('post_date', 'desc')->limit(3)->get();
        return view ('welcome', array('posts' => $posts))->with('page','Home');
    }

    

   
}
