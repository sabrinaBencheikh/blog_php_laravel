@extends('../layouts/main')

<!-- partie article -->
@section('content')

<section id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ $post->post_name }}̄̄</h2>
        </div><br>
            <h5>TITRE: {{ $post->post_title }}</h5><br>
            <p>{{ $post->post_content }}</p>
    </div>
</section><br>
<hr>
    
<!-- partie ajouter un commentaire -->
    
<div class="container">
    <h4>Ajouter un commentaire</h4>
    <form action="/Comments" method="POST">
    {{ csrf_field() }}

    <div>
        <textarea name="comment" placeholder="Votre commentaire..."  class="form-control" rows="2" required="required"></textarea>
        {!! $errors->first('comment', '<span class="help-block">:message</span>') !!}
    </div><br>
        <button class="btn btn-primary" type="submit">Publier</button>
</form><br>

<!-- afficher les commentaires -->


    <div class="list-group">
        <h4><strong ><a href="/Articles/{{ $post->post_name }}/Comments"> Avis ({{ count($post->comments) }}) :</a></strong></h4>
            @forelse ($post->comments as $comment)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                       <small><Strong>{{ $post->user->name }}</Strong>, publié le {{ $comment->created_at->Format('d/m/Y à H:m') }}</small> 
                       <span>Mis à jour {{ $post->updated_at->diffForHumans() }} </span>
                    </div>
                        <p>{{ $comment->body }}</p>
                    </div><br>
    
@empty
    <div>Aucun commentaire pour cet article.</div>
            @endforelse
    </div>
</div>

@endsection