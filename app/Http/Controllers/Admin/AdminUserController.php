<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserEmail;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;

class AdminUserController extends Controller
{
    public function bulkUploadUsers(Request $request)
    {
        // dd($request->file('file'));
        Excel::import(new ImportUser, $request->file('file')->store('files'));
        return back()->with('msg', 'Users uploaded successfully.');
    }

    public function sendMultipleWelcomeEmails(Request $request)
    {
        // $users = User::whereIn("id", $request->ids)->get();
        $users = User::all();
        // dd($users);

        // Mail::to($users)->send(new UserEmail());
        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new UserEmail($user));
        }

        if(Mail::failures())  return back()->with('msg', 'Emails could not be sent!');

        return back()->with('msg', 'Emails sent successfully.');
    }

    public function deleteUser(Request $request)
    {
        if ($user = User::with('userRole')->find($request->user_id)) {
            if ($user->delete())
                return redirect()->back()->with('msg', 'User deleted Successfully');
            else return redirect()->back()->with('msg', 'Failed to delete user');
        } else return redirect()->back()->with('msg', 'User not found');
    }

    public function elevateUserRole(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Validation Failed');

        if ($user = User::with('userRole')->find($request->user_id)) {

            $admin = UserRole::where('title', 'admin')->first();
            $user->user_role_id = $admin->id;

            if ($user->save()) {
                return redirect()->back()->with('msg', 'User elevated to admin Successfully');
            }
            else return redirect()->back()->with('msg', 'Failed to elevate user to admin');
        } else return redirect()->back()->with('msg', 'User not found');
    }

    public function demoteAccess(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Validation Failed');

        if ($user = User::with('userRole')->find($request->user_id)) {

            $admin = UserRole::where('title', 'user')->first();
            $user->user_role_id = $admin->id;

            if ($user->save()) {
                return redirect()->back()->with('msg', 'Admin demoted Successfully');
            }
            else return redirect()->back()->with('msg', 'Failed to demote admin');
        } else return redirect()->back()->with('msg', 'User not found');
    }

    public function resetPassword(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Validation Failed');

        $user = User::find($request->user_id);
        $user->password = FacadesHash::make(strtolower($user->fname));

        if ($user->save()) {
            return redirect()->back()->with('msg', 'Password reset Successful');
        } else return redirect()->back()->with('msg', 'Failed to reset password');
    }


    // Search users by name
    public function search(Request $request)
    {
        dd("here");
        $customers = Customer::where('fname', 'LIKE', '%' . $request->q . '%')->orWhere('sname', 'LIKE', '%' . $request->q . '%')->get();

        return response()->json([
            'results' => $customers
        ]);
    }
}
