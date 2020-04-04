@extends('layouts/main')
@section ('content')
<div style="padding-top: 100px">
    <h3>Derniers articles publiés:</h3>
<ul>
    @foreach ( $posts as $post )
    
      <li><a href="/Articles/{{ $post->post_name }}"> {{ $post->post_title }} </a></li>
    
    @endforeach
    </ul>
</div>

@endsection