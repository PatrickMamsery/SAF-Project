<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        // var_dump($request->password);
        // exit();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //login in user
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return redirect()->back()->with('msg', 'Invalid login details');
        }


        if (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 2) {
            //redirect
            return redirect()->route('dash'); // TODO::check this out
        }
        else {
            return redirect('/');
        }
        
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }
}
