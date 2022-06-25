<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\User;
use App\Models\Upload;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Carbon;
use DB;
use Validator;

class AdminInfoController extends Controller
{
    public function getInfos()
    {
        $infos = Info::paginate();

        $user_id = auth()->user()->id;
        $loggedUser = User::with('profilePhoto')->find($user_id);

        return view('dashboard.pages.info',
            ['user' => $loggedUser, 'infos' => $infos]
        );
    }

    public function addInfoView()
    {
        $user_id = auth()->user()->id;
        $loggedUser = User::with('profilePhoto')->find($user_id);

        return view('dashboard.pages.addInfo',
            ['user' => $loggedUser]
        );
    }

    public function addInfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'media' => 'required|file',
            'media.*' => 'mimes:jpeg,image/jpeg,jpg,png,gif,csv,txt,pdf,svg'            
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Invalid data submitted');

        $info = new Info;

        $info->title = $request->title;
        $info->content = $request->content;
        $info->inhouse = $request->inhouse == NULL ? 0 : 1;
        // dd($request->inhouse);

        try {
            DB::transaction(function () use ($info, $request) {
                if($request->hasFile('media')) $this->uploadPhoto($info, $request);
            });
        } catch (Exception $e) {
            return redirect()->back()->with('msg', 'Failed to post info');
        }
        return redirect()->back()->with('msg', 'Info posted successfully');
    }

    public function deleteInfo(Request $request)
    {
        if ($info = Info::find($request->info_id)) {
            if ($info->delete()) {
                $public_id = preg_match("/upload\/(?:v\d+\/)?([^\.]+)/", $info->media, $matches);
                Cloudinary::destroy($matches[1]);
                return redirect()->back()->with('msg', 'Info deleted successfully');
            } else return redirect()->back()->with('msg', 'Failed to delete info');
        } else return redirect()->back()->with('msg', 'Info not found');
    }


    // Helper functions
    public function uploadPhoto($info, $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['media']);

        if ($handle->uploaded){
            $handle->file_new_name_body = $request->file('media')->getClientOriginalName();
            $handle->image_resize = true;
            $handle->image_x = rand(100, 320);
            $handle->image_ratio_y = true;
            // $path = 'img/newphotos/';
            $cloudinary_path = Cloudinary::upload($request->file('media')->getRealPath(), [
                'folder' => 'Info'
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
                
                $info->media = $cloudinary_path;
                $info->save();
            }
            else {
                echo 'error : ' . $handle->error;
            }
        }
    }
}
