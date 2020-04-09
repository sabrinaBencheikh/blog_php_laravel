<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\contactMessageEnvoye;
use App\Models\Message;

class ContactsController extends Controller
{
    //
    public function create () {
        return view ('contact')->with('page','contact');
    }
 
    public function store(ContactRequest $request){

        //enregistrement en base de donnée
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        //pour récupérer les informations du formulaire
        //on crée un mailable et on lui passe en parametre les données du formulaires
           return new contactMessageEnvoye ($message);
    }
}
