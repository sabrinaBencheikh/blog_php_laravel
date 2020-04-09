<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Models\Post::latest()->paginate(10);
        //orderBy('post_date', 'desc')->get();
        return view ('articles', ['posts' => $posts,
                                  'page'=> 'articles']
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
  /* public function __construct(){

        $this->middleware('auth')->except('index', 'show');
   }*/
   
     public function store(Request $request)
    {
        $post = new Post();
        $post->post_name = request('name');
        $post->post_title = request('title');
        $post->post_content = request('content');
        $post->post_date = now();
        $post->post_type = 'article';
        $post->user_id = auth()->user()->id;
        $post->save();
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_name)
    {
        //get first post qui poste le nom $post_name
    $post = \App\Models\Post::where('post_name',$post_name)->first(); 

    //Pass the post to the view
    return view('posts/single',['post'=> $post,
                                'page'=>"articles/{$post->post_name}"
                                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
