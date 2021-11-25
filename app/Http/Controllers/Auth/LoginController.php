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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //login in user
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return redirect()->back()->with('msg', 'Invalid login details');
        }

        //redirect
        return redirect()->route('gallery');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/');
    }
}
