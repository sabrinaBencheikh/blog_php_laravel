@extends('../layouts/main')

<!-- afficher le champs réponse à un commentaire on click -->

@section('extra-js')
<script>
    function toggleReplyComment(id){
        let element = document.getElementById('replyComment-' + id);
        element.classList.toggle('d-none');
    }
</script>
@endsection


@section('content')

<!-- partie afficher l'article -->

<section id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ $post->post_name }}̄̄</h2>
        </div><br>
            <h5>TITRE: {{ $post->post_title }}</h5><br>
            <div class="d-felx justify-content-center">
                <img style="max-width:100%; height:auto" src="../img/{{ $post->id }}.jpg">
            </div><br>
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

    <form action=" {{ route('comments.store', $post)}} " method="POST" novalidate>
    {{ csrf_field() }}
    <div>
        <textarea name="body" placeholder="Votre commentaire..."  class="form-control" rows="2" required="required"></textarea>
        {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
    </div><br>
        <button class="btn btn-dark btn-lg fa fa-comment" type="submit">commenter</button>
</form><br>


<!-- afficher les commentaires -->

    <div class="list-group">
        <h4><strong ><a href="/Articles/{{ $post->post_name }}/Comments"> Avis ({{ count($post->comments) }}) :</a></strong></h4>
            @forelse ($post->comments as $comment)
            <div class="d-flex justify-content-end">
                @can('update', $comment)
                <a class="btn btn-warning" href=" {{ route('comments.edit',$comment) }} "><span class="fa fa-pencil"></span></a>
                @endcan
                @can('delete', $comment)
                <form action="{{ route('comments.destroy',$comment) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" ><span class="fa fa-trash"></button>
                </form>
                @endcan
            </div>
                <div class="list-group-item mt-3">
                    <div class="d-flex justify-content-between">
                       <small><Strong>{{ $post->user->name }}</Strong>, publié le {{ $comment->created_at->Format('d/m/Y à H:m') }}</small> 
                       <span>modifié {{ $post->updated_at->diffForHumans() }} </span>
                    </div>
                        <p>{{ $comment->body }}</p>

<!-- répondre aux commentaires -->
                        <small><button class=" btn btn-dark fa fa-reply fa-lg" onclick="toggleReplyComment({{$comment->id}})">répondre</button></small>
                            <form action="{{route('replyComment.store', $comment)}}"  method="post" class="ml-3 d-none" id="replyComment-{{$comment->id}}">
                                @csrf
                                <div class="form-group ">
                                    <label for="replyComment">ma réponse</label><br>
                                    <textarea name="replyComment" id="replyComment" cols="60" rows="2" placeholder="votre réponse..." required="required"></textarea><br>
                                    {!! $errors->first('replyComment', '<span class="help-block">:message</span>') !!}
                                    <small><button type="submit" class="btn btn-outline-success">envoyer</button></small>
                                </div>
                            </form>              

<!-- afficher les réponses aux commentaires -->
                    @foreach ($comment->comments as $replyComment)
                    <div class="d-flex justify-content-end">
                        @can('update', $replyComment)
                        <a class="btn btn-warning" href=" {{ route('comments.edit',$replyComment) }} "><span class="fa fa-pencil"></span></a>
                        @endcan
                        @can('delete', $replyComment)
                        <form action="{{ route('comments.destroy',$replyComment) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" ><span class="fa fa-trash"></button>
                        </form>
                        @endcan
                    </div>
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between">
                               <small><Strong>{{ $post->user->name }}</Strong>, publié le {{ $replyComment->created_at->Format('d/m/Y à H:m') }}</small> 
                               <span>modifié {{ $post->updated_at->diffForHumans() }} </span>
                            </div>
                                <p>{{ $replyComment->body }}</p>
                        </div>
                    @endforeach               
                </div><br>

            @empty
                <div>Aucun commentaire pour cet article.</div>
            @endforelse
    </div>
    
</div>

@endsection