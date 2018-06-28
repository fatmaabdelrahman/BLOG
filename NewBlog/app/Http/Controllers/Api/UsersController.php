<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Role;

class UsersController extends Controller
{
	public function register()
    {
       
       $rules=[
			'name'=>'required',
			'email'=>'required|email',
			'password'=>'required',
		];

		$validate= Validator::make(request()->all(),$rules);

		$user = new User;
    	$user->name=request('name');
    	$user->email=request('email');
    	$user->password=bcrypt(request('password'));
    	$user->api_token=request('api_token');

    	  if ($user->save()) 
    	  {
          	$user->login = [
                'href' => 'api/login',
                'method' => 'POST',
                'params' => 'email, password'
            ];
            $response = [
                'msg' => 'User created',
                'user' => $user
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'An error occurred'
        ];

        return response()->json($response, 404);
      
       }

    // for login
	public function login()
	{
		$rules=[
			'email'=>'required|email',
			'password'=>'required',
		];
		$validate= Validator::make(request()->all(),$rules);



		if($validate->fails())
		{
			return response(['status'=>false,'messages'=>$validate->messages()]);
		}else{
			if(auth()->attempt(['email'=>request('email'),'password'=>request('password')]))
			{
				$user = auth()->user();
				$user->api_token = str_random(50);
				$user->save();
				return response(['status'=>true, 'user'=>$user,'token'=>$user->api_token]);
			} else{
				return response(['staus'=>false,'message'=>'the Email or password Incorrect']);
			}


		}


	}


}