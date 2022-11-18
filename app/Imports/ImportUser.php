<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserRole;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Exception;

class ImportUser implements ToModel, WithHeadingRow , WithMultipleSheets
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $fname = $row['firstname'];
        $mname = $row['middlename'];
        $sname = $row['lastname'];
        $email = $row['email'];
        $phone = $row['phone'];

        //check if required fields are missing; do not execute; continue
        if (!$fname || !$sname || !$phone) {
            Log::error("Failed to record from excel some data are missing".  implode(',',$row));
            return;
        }

        // checking if entry already exists in database
        if(User::where('fname', $fname)->where('mname', $mname)->where('sname', $sname)->where('phone', $phone)->where('email', $email)->exists()){
            Log::error("Failed to record from excel user already exists".  implode(',',$row));
            return;
        }

        try {
            DB::transaction(function () use ($fname, $mname, $sname, $phone, $email) {
                $user = new User();
                $user->fname = $fname;
                $user->mname = $mname ? $mname : NULL;
                $user->sname = $sname;
                $user->phone = $phone;
                $user->email = $email;

                $userRole = UserRole::where('title', 'user')->first();
                $user->user_role_id = $userRole->id;
                $user->password = Hash::make($fname);
                $user->save();

            });
        } catch (Exception $error) {
            return dd($error);
        }
    }

    public function headingRow(): int
    {
        return 3;
    }

    public function sheets(): array
    {
        return [
            new ImportUser()
        ];
    }
}
