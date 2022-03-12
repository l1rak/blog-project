<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function __contruct(){
        $this->middleware('guest', ['except'=>'logout']);
    }

    public function index()
    {
        return view('sessions.login');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|min:3'
        ]);

        $userData = [
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        ];


        if(! auth()->attempt($userData))
        {
            return back()->withErrors([
                'message' => 'Please check your credentials and try again.'
            ]);
        }

        return redirect()->home();

    }





    function logout()
    {
        Auth::logout();
        return redirect()->home();
    }
}

?>
