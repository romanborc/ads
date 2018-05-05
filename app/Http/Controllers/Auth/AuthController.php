<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
	public function create()
	{
		if (auth()->check() == false) {
			return view('index');
		} else {
			return redirect()->home()->withErrors([
			    'message' => "already logged in",
			]);
		} 
	}

	public function store()
	{
		$this->validate(request(), [
		    'name' => 'required|unique:users|min:2',
		    'password' => 'required|min:4',
		]);

		$users_name = User::all()->pluck('name');
		$concurrences = true;

		foreach ($users_name as $user_name) {
		    if($user_name == request('name')) {
		    	$concurrences = false;
		    	$user_pswrd = User::where('name', request('name'))->pluck('password')->first();

		    	if(Hash::check(request('password'), $user_pswrd)) {
		    	    $user = User::where('name', request('name'))->first();
		    	    auth()->login($user);
		    	    return redirect()->index();	
		    	} else {
		    		return redirect()->back()->withErrors([
		    		    'message' => "A user with this name already exists, check your password or choose a different name",
		    		]);
		    	}
		    }
		}
		if($concurrences) {
			$user = User::create([
				'name' => request('name'),
				'password' => request('password'),
			]);

			auth()->login($user);
			return redirect()->index();
		}
	}

	public function destroy()
	{
		if(auth()->check() == true) {
			auth()->logout();
			return redirect()->index();
		} else {
			return redirect()->index()->withErrors([
				'message' => "You're not logged in", 
			]);
		}
	}


}
