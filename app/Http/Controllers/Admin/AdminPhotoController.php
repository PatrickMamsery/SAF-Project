<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Upload;
use App\Models\Comment;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon;
use DB;
use Auth;
use Validator;

class AdminPhotoController extends Controller
{
    public function deletePhoto(Request $request)
    {
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
                Cloudinary::destroy($photo->path);
                return redirect()->back()->with('msg', 'Photo deleted successfully');
            } else return redirect()->back()->with('msg', 'Failed to delete photo');
        } else return redirect()->back()->with('msg', 'Photo not found');
    }
}
