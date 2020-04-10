@extends('layouts.main')
@section ('content')
<div class="container">
  <h4 class="text-center">DERNIERS ARTICLES PUBLIES:</h4><br>
  <div class="list-group-item">
       <ul>
          @foreach ( $posts as $post )
           <li><a href="/Articles/{{ $post->post_name }}"> {{ $post->post_title }} </a></li><br>
          @endforeach
        </ul>
  </div>
</div>

@endsection