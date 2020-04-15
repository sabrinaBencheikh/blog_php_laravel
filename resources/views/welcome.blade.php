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
  <div class="text-center">
    <div class="jumbotron">
      <p>Projet Programation web coté serveur</p><br>
      <p>Application web avec Laravel</p>
    </div>
    <p>Réalisé par</p>
    <td>
      <tr>Bouaziz Mohammed Amine et Bencheikh Sabrina </tr>
    </td>
    <p><br> Encadré par</p>
    <td>
      <tr>Floriant Rodriguez et Pierre Blarre</tr>
    </td>
  </div>
</div>

@endsection