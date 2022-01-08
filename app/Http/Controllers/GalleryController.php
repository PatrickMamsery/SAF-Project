<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Upload;
use Carbon;
use DB;
use Auth;

class GalleryController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function getPhotos()
    {
        if($photos = Photo::all()){
            return view('gallery.index', ['photos' => $photos]);
        }
    }

    public function getUploads()
    {
        if($uploads = Upload::all()){
            return view('gallery.index', ['photos' => $uploads]);
        }
    }
}
