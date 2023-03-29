<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\User;
use App\Bid;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function login(){
    	return view('user.login');
    }

    public function register(){
    	return view('user.register');
    }

    public function auth(UserLoginRequest $request)
    {
		if($user = User::where('login', $request->login)->first()
			and Hash::check($request->password, $user->password)){
			Auth::login($user);
			if(Auth::user()->role==1)
				return redirect()->route('admin.index');
			return redirect()->route('client.index');
		}
		return back()->withErrors('Неверный логин или пароль');
	}


	public function logout(){
		Auth::logout();
		return redirect()->route('main');
	}

	public function store(UserRegisterRequest $request){
		$user = User::create(
			$request->except('password_confirmation', 'agreement', 'password')+[
				'password' => Hash::make($request->password),
				'role' => 2
			]);
		if($user)
			return redirect()->route('login');
		return back()->withErrors('Ошибка сохранения');
				
	}

	
}


