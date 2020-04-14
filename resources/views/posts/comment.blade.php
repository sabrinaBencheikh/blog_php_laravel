@extends('../layouts/main')

<!-- partie afficher l'article -->
@section('content')

<section id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ $post->post_name }}̄̄</h2>
        </div><br>
            <h5>TITRE: {{ $post->post_title }}</h5><br>
            <div class="d-flex justify-content-end">
                @can('update', $post)
                <a class="btn btn-warning" href=" {{ route('articles.edit', $post) }} "><span class="fa fa-pencil"></a>
                @endcan
                @can('delete', $post)
                <form action="{{ route('articles.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><span class="fa fa-trash"></button>
                </form>
                @endcan
            </div>
            <p>{{ $post->post_content }}</p>
    </div>
</section><br>
<hr>
    
<!-- partie ajouter un commentaire -->
    
<div class="container">
    <h4>Ajouter un commentaire</h4>

    <form action=" {{ route('comments.store', $post)}} " method="POST">
    {{ csrf_field() }}
    <div>
        <textarea name="body" placeholder="Votre commentaire..."  class="form-control" rows="2" required="required"></textarea>
        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
    </div><br>
        <button class="btn btn-dark btn-lg fa fa-comment" type="submit">Commenter</button>
</form><br>


<!-- afficher les commentaires -->


    <div class="list-group">
        <h4><strong ><a href="/Articles/{{ $post->post_name }}/Comments"> Avis ({{ count($post->comments) }}) :</a></strong></h4>
            @forelse ($post->comments as $comment)
            <div class="d-flex justify-content-end">
                @can('update', $comment)
                <a class="btn btn-warning" href=" {{ route('comments.edit', $post) }} "><span class="fa fa-pencil"></span></a>
                @endcan
                @can('delete', $comment)
                <form action="{{ route('comments.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" ><span class="fa fa-trash"></button>
                </form>
                @endcan
            </div>
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                       <small><Strong>{{ $post->user->name }}</Strong>, publié le {{ $comment->created_at->Format('d/m/Y à H:m') }}</small> 
                       <span>modifié {{ $post->updated_at->diffForHumans() }} </span>
                    </div>
                        <p>{{ $comment->body }}</p>
                    <a  class="btn btn" href="http://"></a>
                    <small><a class="fa fa-reply fa-lg" href="{{route('comments.store', $post)}} ">répondre</a></small>
                </div><br>
                

            @empty
                <div>Aucun commentaire pour cet article.</div>
            @endforelse
    </div>
    
</div>

@endsection