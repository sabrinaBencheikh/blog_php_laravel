<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index () {
        $posts = \App\Models\Post::latest()->limit(3)->get();
        return view ('welcome', array('posts' => $posts,
                                      'page' => 'Home'));
    }

    

   
}
