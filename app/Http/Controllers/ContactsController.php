<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactsController extends Controller
{
    //
    public function create () {
        return view ('contact')->with('page','contact');
    }
 
    public function store(ContactRequest $request){
        //pour récupérer les informations du formulaire
           return view('confirm')->with('page','contact');
    }
}
