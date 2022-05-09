<?php

namespace App\Http\Controllers;
// namespace Verot\Upload;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Like;
use App\Models\View;
use App\Models\Upload;
use App\Models\Comment;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon;
use DB;
use Auth;
use Validator;

class PhotoController extends Controller
{
    public function addPhoto(Request $request)
    {
        // validate the incoming request 
        $validator = Validator::make($request->all(), [
            'photo' => 'required|file',
            'photo.*' => 'mimes:jpeg,image/jpeg,jpg,png,gif,csv,txt,pdf,svg'            
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Invalid data submitted');

        $photo = new Photo;
        $user_id = auth()->user()->id;

        $photo->posted_on = Carbon\Carbon::now();
        $photo->user_id = $user_id;
        $photo->link = $request->photo ? $request->photo : NULL;
        $photo->caption = $request->caption ? $request->caption : NULL;

        try {
            DB::transaction(function () use ($photo, $user_id, $request) {
                if($request->hasFile('photo')) $this->uploadPhoto($user_id, $photo, $request);
                
                $comment = new Comment;
                $comment->user_id = Auth::user()->id;
                $comment->photo_id = $photo->id;
                $comment->body = 'Cool';
                $comment->save();
            });
        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Failed to post photo');
        }
        return redirect()->back()->with('msg', 'Photo posted successfully');
    }

    // Update Photo

    // Delete Photo 
    public function deletePhoto(Request $request)
    {
        // dd($request->photo_id);
        if ($photo = Photo::with('comments', 'likes', 'views', 'tags')->find($request->photo_id)) {
            foreach ($photo->likes as $like) {
                $like->delete();
            }

            foreach ($photo->comments as $comment) {
                $comment->delete();
            }

            foreach ($photo->views as $view) {
                $view->delete();
            }

            if ($photo->delete()) {
                $public_id = preg_match("/upload\/(?:v\d+\/)?([^\.]+)/", $photo->path, $matches);
                // dd($matches);
                Cloudinary::destroy($matches[1]);
                return redirect()->back()->with('msg', 'Photo deleted successfully');
            } else return redirect()->back()->with('msg', 'Failed to delete photo');
        } else return redirect()->back()->with('msg', 'Photo not found');
    }

    public function addLike(Request $request)
    {
        // dd($request);
        $like = new Like;
        $like->date = Carbon\Carbon::now();
        $like->user_id = $request->user_id;
        $like->photo_id = $request->photo_id;
        
        if($like->save()) {
            return redirect()->back();
        }
    }

    public function addComment(Request $request)
    {
        // dd($request);
        $comment = new Comment;
        $comment->date = Carbon\Carbon::now();
        $comment->user_id = $request->user_id;
        $comment->photo_id = $request->photo_id;
        $comment->body = $request->comment;
        
        if($comment->save()) {
            return redirect()->back();
        }
    }


    // Helper functions
    public function uploadPhoto($user_id, $photo, $request)
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
                
                $photo->path = $cloudinary_path;
                $photo->save();
            }
            else {
                echo 'error : ' . $handle->error;
            }
        }
    }
}
