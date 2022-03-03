@extends('layouts.userdash')

@section('content')
    <div class="container">
        <div class="mt-3 py-3 px-0 custom-title">
            <h4 class="custom-title">
                Welcome, {{Auth::guard('web')->user()?Auth::guard('web')->user()->fname.' '.Auth::guard('web')->user()->sname:'Guest User'}}
            </h4>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="border border-success rounded py-5 px-2 mt-3">
                    <h5 class="text-center">User Details</h5>
                    <label for="Name">Name</label> {{ $user->fname }} {{ $user->sname }}
                </div>
                <a href="{{ route('membership_form') }}">
                    <button class="btn btn-custom">Complete Profile</button>
                </a>
            </div>
            <div class="col-md-6">
                <div class="border border-success rounded py-5 px-2 mt-3">
                    @if (!$user->profilePhoto)
                        @if ($user->gender == 'male')
                            <div class="profile_img">
                                <img class="user_img" src="img/profile_photos/avatar.png" alt="user_profile">
                                <div class="overlay">
                                    <i class="bx bx-home"></i>
                                </div>
                            </div>
                        @elseif ($user->gender == 'female')
                        <div class="profile_img">
                            <img class="user_img" src="img/profile_photos/avatar-female.png" alt="user_profile">
                            <div class="overlay">
                                <i class="bx bx-home"></i>
                            </div>
                        </div>
                        @else
                        <div class="profile_img">
                            <img class="user_img" src="img/profile_photos/avatar.png" alt="user_profile">
                            <div class="overlay">
                                <i class="bx bx-home"></i>
                            </div>
                        </div>
                        @endif
                    @endif
                    <form action="addProfilePhoto" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}" required>
                        <button type="submit" style="text-align: center; color: white;" class="btn btn-custom btn-circle"><i class="bx bx-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection