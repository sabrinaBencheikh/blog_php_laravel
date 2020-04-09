@extends('layouts/main')

@section('content')

@component('mail::message')
# Hey {{ $msg->name }},

Merci. Votre message a été transmis à l'administrateur du site.<br>
Vous receverez un message rapidement

@component('mail::button', ['url' => '/'])
Retour
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

@endsection
