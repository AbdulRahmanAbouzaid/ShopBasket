<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LogsController extends Controller
{

    public function __construct()

    {

        $this->middleware('guest')->except('destroy');

    }


    
    public function viewForm()
    {
    	
    	return view('login');

    }

    public function restore(){

    	if(auth()->attempt(request(['name', 'password'])))

			return redirect('/');

		else

			return back()->withErrors('wrong data!');

    }

    public function store()

    {

        $this->validate(request(), [

            'name' => 'required',

            'password' => 'required|confirmed'

        ]);


        $user = new User([

            'name' => request('name'),

            'password' => \Hash::make(request('password')),

            'is_admin' => false

            ]);

        $user->save();

        auth()->login($user);

        return redirect('/');

    }


    public function destroy()
    {
        
        auth()->logout();
        
        return redirect('/');
        
    }

}
