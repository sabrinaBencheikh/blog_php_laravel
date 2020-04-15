<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   public function __construct(){

            $this->middleware('auth')->except('show','index');
    }


    public function index()
    {
        $posts = \App\Models\Post::latest()->paginate(10);
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
   
    
     public function store(ArticleRequest $request)
    {
        $post = new Post();
        $post->post_name = request('name');
        $post->post_title = request('title');
        $post->post_content = request('content');
        $post->post_date = now();
        $post->post_type = 'article';
        $post->user_id = auth()->user()->id;
        $post->save();
        
        return redirect()->route('article.show', $post->post_name);
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
                                'page'=>"Articles/{$post->post_name}"
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
        $post = \App\Models\Post::find($id);
        $this->authorize('update', $post);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ArticleRequest $request, $id)
    {
        $post = \App\Models\Post::find($id);
        $this->authorize('update', $post);

        $post->post_name = request('name');
        $post->post_title = request('title');
        $post->post_content = request('content');
        $post->updated_at = now();
        $post->save();
        //$post->update($request->all());
        return redirect()->route('article.show', $post->post_name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Models\Post::find($id);
        $this->authorize('delete', $post);

        Post::destroy($id);
        return redirect()->route('articles.index');
    }
}
