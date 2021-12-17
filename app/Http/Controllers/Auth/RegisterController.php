<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $user_role = UserRole::where('title', 'user')->first();
        $user = new User;
            $user->fname = $request->fname;
            $user->sname = $request->sname;
            $user->gender = $request->gender;
            $user->role = $request->role ? 1 : NULL;
            $user->phone = $request->phone;
            $user->user_role_id = $user_role->id;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

        if ($user->save()) {
            return redirect()->back()->with('msg', 'Registration Successful');
        }
        else return redirect()->back()->with('msg', 'Failed registration');
    }
}
