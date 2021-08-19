<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

	public function show()
	{
		return view('login');
	}


    public function login(LoginRequest $request){

        $request->validate([
            'password' => 'required'
        ]);

        $password = $request->password;

        if ($password == "123456") {
        	Session(['password' => $password]);
        	return Redirect::to('/orders');
        } else if (is_null($password)) {
        	return Redirect::to('login')
        			->withErrors(['fail'=>'請輸入密碼']);
        } else {
	       	return Redirect::to('login')
					->withErrors(['fail'=>'密碼錯誤']);
        }
    }
}
