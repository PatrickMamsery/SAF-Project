<?php

namespace App\Http\Controllers;
// namespace Verot\Upload;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Upload;
use App\Models\Caption;
use App\Models\Comment;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon;
use DB;
use Auth;

class PhotoController extends Controller
{
    public function addPhoto(Request $request)
    {
        $photo = new Photo;
        $user_id = auth()->user()->id;

        $caption = new Caption;
        $caption->user_id = Auth::user()->id;
        $caption->body = 'Cool';
        $caption->save();

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->body = 'Cool';
        $comment->save();

        $photo->posted_on = Carbon\Carbon::now();
        $photo->user_id = $user_id;
        $photo->link = $request->photo ? $request->photo : NULL;
        $photo->caption_id = $caption ? $caption->id : 1;
        $photo->comment_id = $comment ? $comment->id : 0;

        try {
            DB::transaction(function () use ($photo, $user_id, $request) {
                if($request->hasFile('photo')) $this->uploadPhoto($user_id, $request);
                $photo->save();
            });
        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Failed to post photo');
        }
        return redirect()->back()->with('msg', 'Photo posted successfully');
    }

    public function uploadPhoto($user_id, $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['photo']);

        if ($handle->uploaded){
            $handle->file_new_name_body = $request->file('photo')->getClientOriginalName();
            $handle->image_resize = true;
            $handle->image_x = rand(100, 320);
            $handle->image_ratio_y = true;
            // $path = 'img/newphotos/';
            $cloudinary_path = Cloudinary::upload($request->file('photo')->getRealPath(), [
                'folder' => 'SAF'
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
                // return redirect()->back()->with('msg', 'Image resized'); 
            }
            else {
                echo 'error : ' . $handle->error;
            }
        }
    }
}
