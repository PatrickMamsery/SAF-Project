@extends('layouts.dash')

@section('info')
    <div class="">
        <div class="mt-3 py-3 px-0 custom-title">
            <h4 class="custom-title">
                Welcome, {{Auth::guard('web')->user()?Auth::guard('web')->user()->fname.' '.Auth::guard('web')->user()->sname:'Guest User'}}
            </h4>
        </div>
        
        <div class="container" id="main">
            @include('dashboard.sections.user_list')

        </div>
    </div>

@endsection

@section('third-party-scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    
@endsection