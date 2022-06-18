<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;

class AdminUserController extends Controller
{
    public function deleteUser(Request $request)
    {
        if ($user = User::with('userRole')->find($request->user_id)) {
            if ($user->delete())
                return redirect()->back()->with('msg', 'User deleted Successfully');
            else return redirect()->back()->with('msg', 'Failed to delete user');
        } else return redirect()->back()->with('msg', 'User not found');
    }

    public function updateUserRole(Request $request)
    {
        // dd($request);
        if ($user = User::with('userRole')->find($request->user_id)) {
            if ($request->input('new_role') != NULL) {
                $role = UserRole::where('id', $request->input('new_role'))->first();
                $user->user_role_id = $role->id;
                // dd($user->user_role_id);
                return redirect()->back()->with('msg', 'Role updated Successfully');
            }
            else return redirect()->back()->with('msg', 'Failed to update user-role');
        } else return redirect()->back()->with('msg', 'User not found');
    }
}
