@extends('layouts.userdash')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="border border-success rounded py-5 px-2 mt-3">
                    <h5 class="text-center">User Details</h5>
                    <label for="Name">Name</label> Restuta Adrian
                </div>
            </div>
            <div class="col-md-6">
                <div class="border border-success rounded py-5 px-2 mt-3">
                    <img class="user_img" src="img/profile_photos/avatar.png" alt="user_profile">
                </div>
            </div>
        </div>
    </div>
@endsection