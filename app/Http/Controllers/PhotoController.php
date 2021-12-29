<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Upload;
use App\Models\Caption;
use App\Models\Comment;
use Carbon;
use DB;

class PhotoController extends Controller
{
    public function addPhoto(Request $request)
    {
        $photo = new Photo;
        $user_id = auth()->user()->id;
        $caption = Caption::find($user_id);
        $comment = Comment::find($user_id);

        $photo->posted_on = Carbon\Carbon::now();
        $photo->user_id = $user_id;
        $photo->link = $request->photo ? $request->photo : NULL;
        $photo->caption_id = $caption ? $caption->id : 1;
        $photo->comment_id = $comment ? $comment->id : 0;

        try {
            DB::transaction(function () use ($photo, $request) {
                $photo->save();
                $upload_name = $request->photo;
                var_dump($request->photo); exit();
                if($request->hasFile('photo')) $this->createUpload($user_id, $upload_name, $request);
            });
        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Failed to post photo');
        }
        return redirect()->back()->with('msg', 'Photo posted successfully');
    }

    public function createUpload($user_id, $upload_name, $request)
    {
        $upload = new Upload;
        $upload->name = $request->file($upload_name)->getClientOriginalName();
        $upload->path = str_replace('public', '', $request->file($upload_name)->store('public/img/uploads'));
        $upload->created_at = Carbon\Carbon::now();
        $upload->updated_at = Carbon\Carbon::now();

        $upload->save();

        // if ($upload->save()) {
        //     Photo::insert([
        //         'user_id' => $user_id,
        //         ''
        //     ]);
        // }
    }
}
