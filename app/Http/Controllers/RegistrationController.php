<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegistrationController extends Controller
{

    public function create()
    {
        return view('registrations.create');
    }

    public function store(Request $request)
    {
      // validate the form
        $this->validate(request(),[
          'name'=>'required',
          'email'=>'required|email',
          'password'=>'required|confirmed'
        ]);
     // create new User
     $user=User::create(request(['name','email','password']));

     // sign them in
     auth()->login($user);

     // redirect them
    return redirect()->home();



    }

}
