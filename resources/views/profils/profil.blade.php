@extends('layouts.main')


@section('content')


<div class="container d-flex justify-content-center">
    <div class="row">
        <div class="col-8">
            <div class="list-group-item">
                <h3>Mon profil</h3>
                <h1> {{ $user->name }} </h1>
                <p> {{ $user->email }} </p>
            </div>
        </div>

    </div>

</div>
 
    
@endsection