@extends('layouts/main')

@section('content')
<div style="padding-left:25%">
    <h3>Nous contacter:</h3><br>
    <form action="/Contacts" method="POST">
        @csrf

        <div>
        <label for="contact_name">Name</label><br>
        <input type="text" name ="name" id="name" required="required"><br>
        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
        </div>
        <div>
        <label for="contact_email">Email</label><br>
        <input type="email" name="email" id="email" required="required"><br>
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
        </div>
        <div>
        <label for="contact_message">Message</label><br>
        <textarea name="message" id="message"  placeholder="Votre message..." required="requied" cols="60" rows="10"></textarea><br>
        {!! $errors->first('message', '<span class="help-block">:message</span>') !!}
        </div>
        <button type="submit">Envoyer >></button>
    </form>
    
</div>

@endsection