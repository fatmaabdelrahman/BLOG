<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subscriber;


class Subscribers extends Controller
{
	public function show(){
		return view('content.subscribers');
	}

    public function store(Request $request){

    	$data=$request->all();
    	$sub = new subscriber;
    	$sub->email = request('email');
    	$sub->save();
    	return redirect('/posts');
    }


    public function admin_show(){

        $subscribers = subscriber::all();

        return view('content.adminshow', compact('subscribers'));


    }



    

}
