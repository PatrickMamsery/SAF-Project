<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Upload;
use App\Models\ProfilePhoto;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon;
use DB;
use Auth;
use Validator;

class ProfilePhotosController extends Controller
{
    public function addProfilePhoto(Request $request)
    {
        //validate the incoming request
        $validator = Validator::make($request->all(), [
            'profile_photo' => 'required|file',
            'profile_photo.*' => 'mimes:jpeg,image/jpeg,jpg,png,gif,csv,txt,pdf'
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Invalid data submited');

        $profile_photo = new ProfilePhoto;
        $user_id = $request->user_id;
        
        try {
            DB::transaction(function () use ($profile_photo, $user_id, $request) {
                if($request->hasFile('profile_photo')) $this->uploadProfilePhoto($user_id, $profile_photo, $request);
                //
            });
        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Failed to change profile photo');
        }
        return redirect()->back()->with('msg', 'Profile photo changed successfully');
    }

    public function uploadProfilePhoto($user_id, $profile_photo, $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['profile_photo']);

        if ($handle->uploaded){
            $handle->file_new_name_body = $request->file('profile_photo')->getClientOriginalName();
            $handle->image_resize = true;
            $handle->image_x = rand(100, 320);
            $handle->image_ratio_y = true;
            // $path = 'img/newphotos/';
            $cloudinary_path = Cloudinary::upload($request->file('profile_photo')->getRealPath(), [
                'folder' => 'Profile Photos'
            ])->getSecurePath();
            $handle->process();
            // var_dump($handle); die;


            if ($handle->processed){
                $upload = new Upload;
                $upload->name = $handle->file_dst_name;
                $upload->path = $cloudinary_path;
                $upload->created_at = Carbon\Carbon::now();
                $upload->updated_at = Carbon\Carbon::now();

                $upload->save();
                
                $profile_photo->path = $cloudinary_path;
                $profile_photo->save();
            }
            else {
                echo 'error : ' . $handle->error;
            }
        }
    }
}
