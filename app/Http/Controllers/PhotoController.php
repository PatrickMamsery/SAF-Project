<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function addPhoto($request)
    {
        $photo = new Photo;
        $user = auth()->user()->id();

        $photo->posted_on = Carbon\Carbon::now();
        $photo->user_id = $user;

    }

    public function createUpload($user_id, $upload_name, $request)
    {
        $upload = new Upload;
        $upload->name = $request->file($upload_name)->getClientOriginalName();
        $upload->path = str_replace('public', '', $request->file($upload_name)->store('public/img/uploads'));
    }
}
