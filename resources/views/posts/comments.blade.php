@extends('layouts/main')

@section('content')

<div class="container">
    <div class="text-venter">
        <h3 class="section-heading text-uppercase">
           <a href="/Articles/{{ $post->post_name }}">Article: {{ $post->post_name }}</a> 
        </h3>
    </div>
       <h4>Avis ({{ count($post->comments) }}) :</h4>
       <div class="list-group">
            @forelse ($post->comments as $comment)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between"> 
                        <small><strong> {{ $post->user->name }} </strong>,
                            Publié le {{ $comment->created_at->Format('d/m/Y à H:m') }}</small>
                        <span><small>Modifié {{ $comment->updated_at->diffForHumans() }}</span></small> 
                    </div>
                    <div > 
                        <p>{{ $comment->body }} </p>
                    </div>
                </div><br>
            @empty
                <div>Aucun commentaire pour ce post</div>
            @endforelse
        </div>
            <div class="d-flex justify-content-center">{{ $post->comments->links() }}</div>
</div>   
@endsection
