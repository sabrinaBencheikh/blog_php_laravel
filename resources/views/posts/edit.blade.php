@extends('layouts/main')

@section('content')

<div class="container">
    <h1> Modifier l'article : <a href= {{ route('article.show', $post->post_name)}} >{{ $post->post_name }}</a></h1>
    <form action=" {{ route('articles.update', $post->id) }} " method="POST">
    @csrf
    @method('PATCH')
        <div class="form-group">
            <input type="text" name="name" value=" {{$post->post_name}} " class="form-control" required = "required" >
            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group">
            <input type="text" name="title" value="{{$post->post_title}}" class="form-control" required = "required">
            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
        </div>
        <div class ="form-group">
        <textarea name="content" rows="10" class="form-control" required = "required">{{$post->post_content}}</textarea>
        {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
        </div>
        <button type="submit" class="btn btn-success">modifier</button>
        <button type="reset" class="btn btn-danger">Annuler</button>

    </form>
</div>   
@endsection

