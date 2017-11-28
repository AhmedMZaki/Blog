<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

  public function __construct(){
    $this->middleware('guest',['except'=>'destroy']);
  }
    public function create()
    {
       return view('sessions.create');
    }

   public function store(){
     // attempt to authenticate user
     if (!auth()->attempt(request(['email','password']))) {
       return redirect()->back()->withErrors([
         'message'=>'Please check your credentials'
       ]);
}
       // redirect to the home page
       return redirect('/posts');
     }



    public function destroy()
    {
        auth()->logout();
        return redirect()->home();
    }
}
