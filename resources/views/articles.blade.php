@extends('layouts/main')



@section('content')
<div class="container">
  <div class="list-group"></div>
        <h1 class="section-header text-center">LES ARTICLES</h1><br>
        @guest
        @else
        <a href="admin/articles/create" class = "btn btn-primary"> Nouvel article</a>
        @endguest
        <div class="mt-3">
        @foreach ( $posts as $post )
          <div class="list-group-item">
              <h4><a href={{ route('article.show', $post->post_name) }} >{{ $post->post_title }}</a></h4> 
              <p> {{ $post->post_content }} </p>
              <div class="d-flex justify-content-between">
                <small> Posté le {{ $post->created_at->Format('d/m/Y à H:m')  }} </small>
                <span> <strong>{{ $post->user->name }} </strong></span>
              </div>
          </div><br>
        @endforeach
      </div>
  </div>
     <div class="d-flex justify-content-center">{{ $posts->links() }}</div> 
</div>

@endsection
