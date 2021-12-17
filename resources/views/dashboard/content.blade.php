@extends('layouts.dash')

@section('info')
<div class="">
    <p class="admin-name">{{Auth::guard('web')->user()?Auth::guard('web')->user()->fname.' '.Auth::guard('web')->user()->sname:'Guest User'}}</p>
    
</div>
@endsection