<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function create(){

    	return view('Login');
    }

    public function store()
    {
    	if(!auth()->attempt(request(['email','password']))){
    		return back()->WithErrors([
    			'message'=>'Email or password not correct'
    		]);
    	}

    	 return redirect('/posts');
    }

    public function destroy()
    {
    	auth()->logout();
    	return redirect('/posts');
    }
}
