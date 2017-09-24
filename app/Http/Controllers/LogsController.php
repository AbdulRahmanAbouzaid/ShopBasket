<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogsController extends Controller
{
    
    public function viewForm()
    {
    	
    	return view('login');

    }

    public function loggingIn(){

    	if(auth()->attempt(request(['name', 'password'])))

			return redirect('/');

		else

			return back()->withErrors('wrong data!');

    }

    public function destroy()
    {
        
        auth()->logout();
        
        return redirect('/');
        
    }

}
