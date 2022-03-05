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
        if($users = User::with('profilePhoto')->get()) {
            // var_dump($users[1]->profilePhoto->path); die;
            $photos = Photo::all();
            return view('dashboard.content',
                ['users' => $users],
                ['photos' => $photos],
            );
        }
    }

    public function userDash()
    {
    
        $user_id = auth()->user()->id;

        if($user = User::with('profilePhoto')->find($user_id)) {
            $photos = Photo::where('user_id', $user_id)->get();
            // dd($photos);
            return view('dashboard.user_content',
                ['user' => $user],
                ['photos' => $photos],
            );
        }
    }
}
