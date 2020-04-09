@extends('layouts/main')

@section('content')

<div class="container">
    <h1>Nouvel article</h1>
    <form action=" {{ route('articles.store') }} " method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="name" placeholder="Nom de l'article" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="title" placeholder="Titre de l'article" class="form-control">
        </div>
        <div class ="form-group">
        <textarea name="content" rows="10" placeholder="Votre article..." class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Publier</button>
        <button type="reset" class="btn btn-danger">Annuler</button>

    </form>
</div>   
@endsection

