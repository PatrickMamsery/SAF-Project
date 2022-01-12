<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Upload;
use DB;
use Auth;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function indexDash()
    {
        if($users = User::all()) {
            return view('dashboard.content',
                ['users' => $users]
            );
        }
    }

    public function userDash()
    {
    
        $user_id = auth()->user()->id;

        if($user = User::find($user_id)) {
            return view('dashboard.user_content',
                ['user' => $user],
            );
        }
    }
}
