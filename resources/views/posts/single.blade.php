@extends('../layouts/main')

@section('content')
    <div style="padding-top: 80px ; padding-left: 20px">
        <li><strong>Titre</strong>: 
            <a href="/Articles/{{ $post->post_name }}">{{ $post->post_title }}</a>
        </li>
        <li><strong>Nom de l'article</strong>: {{ $post->post_name }} </li>
        <li><strong>Auteur</strong> : {{ $user->name }} </li><br>
        
        <div style="padding-left: 20px">
            {{ $post->post_content }}
        </div>
    </div>
    

@endsection