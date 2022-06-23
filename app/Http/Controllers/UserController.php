<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\EducationRecord;
use App\Models\EmploymentRecord;
use App\Models\ProfessionalRecord;
use App\Models\ProfilePhoto;
use App\Models\UserDocument;
use App\Models\Upload;
use App\Models\Document;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Hash;
use Validator;
use DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        if($user = User::where('id', $user_id)->first()) {
            // dd($user->id);
            return view('membership_form', ['user' => $user]);
        }
    }

    public function userDash($id)
    {
    
        $user_id = $id;

        if($user = User::with('profilePhoto')->find($user_id)) {
            // dd($photos);
            return view('dashboard.user_content',
                ['user' => $user],
            );
        }
    }

    public function getUserPosts($id)
    {
        $photos = Photo::where('user_id', $id)->paginate();
        $loggedUser = User::with('profilePhoto')->find($id);

        return view('dashboard.pages.user_posts',
            ['user' => $loggedUser, 'photos' => $photos]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //create user or check presence to update
            $user_id = auth()->user()->id;
            $member = User::find($user_id);
            $member->mname = $request->mname;
            $member->joindate = $request->joindate;
            $member->entrydate = $request->entrydate;
            $member->citizenship = $request->citizenship ? $request->citizenship : 'Tanzanian';
            $member->email = $request->email ? $request->email : $member->email;
            $member->phone = $request->phone;
            // $member->designation = $request->designation;
            $member->work_address = $request->work_address;
            $member->voice = $request->voice;
            $member->marital_status=$request->marital_status;


            DB::transaction(function () use($request,$member) {
                
                $member->save();
                $member_id=$member->id;
                
                //store education records
                    $this->createEducationRecord($member_id,$request->institute,$request->degree_class,$request->qualification,$request->education_start_date,$request->education_end_date,$request);
                    if($request->institute_2) $this->createEducationRecord($member_id,$request->institute_2,$request->degree_class_2,$request->qualification_2,$request->education_start_date_2,$request->education_end_date_2,$request);
                    if($request->institute_3) $this->createEducationRecord($member_id,$request->institute_3,$request->degree_class_3,$request->qualification_3,$request->education_start_date_3,$request->education_end_date_3,$request);

                // store professional records
                    $profession=new ProfessionalRecord;
                    $profession->qualification=$request->profession_qualification;
                    $profession->institute=$request->profession_institute;
                    $profession->user_id= $member_id;

                    if(!$profession->save()){
                        Log::error("Professional Record failed to be recorded ///".$request);
                    }

                // store employment records
                    $this->createEmploymentRecord($member_id,$request->employment_company,$request->employment_title,$request->remarks,$request->employment_start_date,$request->employment_end_date,$request);
                    if($request->employment_company_2) $this->createEmploymentRecord($member_id,$request->employment_company_2,$request->employment_title_2,$request->remarks_2,$request->employment_start_date_2,$request->employment_end_date_2,$request);
                    if($request->employment_company_3) $this->createEmploymentRecord($member_id,$request->employment_company_3,$request->employment_title_3,$request->remarks_3,$request->employment_start_date_3,$request->employment_end_date_3,$request);
                
                // store documents
                    if($request->hasFile('passport')) $this->createDocumentRecord($member_id,'passport',$request);
                    if($request->hasFile('cv')) $this->createDocumentRecord($member_id,'cv',$request);

                // create default profile photo
                    $profile_photo = new ProfilePhoto;
                    $profile_photo->path = $member->gender == 'male' || $member->gender == NULL ? 'img/profile_photos/avatar.png' : 'img/profile_photos/avatar-female.png';
                    $profile_photo->user_id = $member_id;

                    if(!$profile_photo->save()){
                        Log::error("Default profile photo failed to be saved. ///".$request);
                    }    
                    
            });


            Session::flash('message', 'Your form is submitted successfully!'); 
            Session::flash('alert-class', 'alert-success'); 

            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function passwordReset(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required_with:password_confirmation|string|confirmed'
        ]);

        if ($validator->fails()) return redirect()->back()->with('msg', 'Validation Failed');

        $user = User::find($id);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            return redirect()->back()->with('msg', 'Your current password is incorrect');
        };

        if ($user->update(['password' => Hash::make($request->password)])) {
            return redirect()->back()->with('msg', 'Password changed successfully');
        } else return redirect()->back()->with('msg', 'Failed to change password');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function createEducationRecord($member_id,$institute,$degree_class,$qualification,$start_date,$end_date,$request)
    {
        $education= new EducationRecord;
        $education->institute=$institute;
        $education->degree_class=$degree_class;
        $education->qualification=$qualification;
        $education->start_date=$start_date;
        $education->end_date=$end_date;
        $education->user_id=$member_id;

        if(!$education->save()) {
            Log::error("Education Record failed to be recorded ///".$request);
        }
    }


    public function createEmploymentRecord($member_id,$company,$title,$remarks,$start_date,$end_date,$request)
    {
        $employment= new EmploymentRecord;
        $employment->company=$company;
        $employment->title=$title;
        $employment->remarks=$remarks;
        $employment->start_date=$start_date;
        $employment->end_date=$end_date;
        $employment->user_id=$member_id;

        if(!$employment->save()) {
            Log::error("Employment   failed to be recorded ///".$request);
        }

    }

    public function createDocumentRecord($member_id,$doc_name,$request)
    {
        $doc = new Document;
        $doc->name=$request->file($doc_name)->getClientOriginalName();
        $doc->path = str_replace('public','',$request->file($doc_name)->store('public/members/documents'));
        $doc->owner = 'member';
        if($doc->save()){

            UserDocument::insert([
                'type'=> ($doc_name == 'letter_one' || $doc_name == 'letter_two')?'letter' :$doc_name,
                'user_id' => $member_id,
                'document_id' => $doc->id,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now()
            ]);
        }
        else{

            Log::error("Document   failed to be recorded ///".$request);

        }
    }

    

}
