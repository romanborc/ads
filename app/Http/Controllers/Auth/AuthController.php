<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
	public function create()
    {
        if (auth()->check() == false) {
            return view('auth.auth');
        } else {
            return redirect()->home();
        }
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:2',
            'password' => 'required|min:4'
        ]);

        $users_names = User::all()->pluck('name');
        $concurrences = true;

        foreach ($users_names as $user_name) {
            if ($user_name == request('name')) {
                $concurrences = false;
                $user_pswrd = User::where('name', request('name'))->pluck('password')->first();
                if (Hash::check(request('password'), $user_pswrd)) {
                    $user = User::where('name', request('name'))->first();
                    auth()->login($user);
                    return redirect()->home();
                } else {
                    return redirect()->back()->withErrors([
                            'errors' => "A user with this name already exists, check your password or choose a different name"
                    ]);
                }
            }
        }

        if ($concurrences) {
            $user = User::create([
                    'name' => request('name'),
                    'password' => bcrypt(request('password'))
            ]);
            auth()->login($user);
            return redirect()->home();
        }
    }

    public function destroy()
    {
        if (auth()->check() == true) {
            auth()->logout();
            return redirect()->home();
        } else {
            return redirect()->home()->withErrors([
                    'errors' => "You are not logged in"
            ]);
        }
    }


}
