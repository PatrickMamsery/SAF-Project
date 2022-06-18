<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
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
        $roles = UserRole::get();
        if($users = User::with('profilePhoto')->paginate()) {
            
            return view('dashboard.pages.users',
                ['user' => $loggedUser, 'roles' => $roles, 'users' => $users]
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
