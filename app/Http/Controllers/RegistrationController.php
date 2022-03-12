<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create(){
        return view('registrations.register');
    }

    public function store(RegistrationForm $form){

        $form->persist();

        session()->flash('message','Thank you so much for signing up!');

        //redirect to home page
        return redirect()->home();

    }


}
