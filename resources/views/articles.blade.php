@extends('layouts/main')



@section('content')
<div style="padding-top: 70px; padding-left:20px">
<h3><strong>Liste des articles</strong></h3>
@foreach ( $posts as $post )
    
      <li><a href="/Articles/{{ $post->post_name }}">{{ $post->post_title }}</a></li>
    
    @endforeach
    </ul>
</div>
@endsection
