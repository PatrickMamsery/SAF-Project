<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Upload;

class AdminPagesController extends Controller
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

    public function getUsers()
    {
        $user_id = auth()->user()->id;
        $loggedUser = User::with('profilePhoto')->find($user_id);
        if($users = User::with('profilePhoto')->paginate()) {
            // var_dump($users[1]->profilePhoto->path); die;
            
            return view('dashboard.pages.users',
                ['user' => $loggedUser, 'users' => $users]
            );
        }
    }

    public function getPosts()
    {
        $photos = Photo::paginate();
        $user_id = auth()->user()->id;
        $loggedUser = User::with('profilePhoto')->find($user_id);

        return view('dashboard.pages.posts',
            ['user' => $loggedUser, 'photos' => $photos]
        );
    }
}
