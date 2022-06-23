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

    <script>

        // $(function () {
            
        //     var table = $('.yajra-datatable').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: "{{ route('dash') }}",
        //         columns: [
        //             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //             {data: 'fname', 'fname'},
        //             {data: 'email', name: 'email'},
        //             {data: 'phone', name: 'phone'},
        //             {data: 'user_role_id', name: 'role'},
        //             {data: 'joindate', name: 'joindate'},
        //             // {data: 'dob', name: 'dob'},
        //             {
        //                 data: 'action', 
        //                 name: 'action', 
        //                 orderable: true, 
        //                 searchable: true
        //             },
        //         ]
        //     });
            
        // });

        $(document).ready(function () {
            $('.delete-user').click(function(){
                $('#admin-delete-user').val($(this).data('user_id'));
            });
        });

        $(document).ready(function () {
            $('.elevate-user-role').click(function(){
                $('#user-elevate').val($(this).data('user_id'));
            });
        });

        $(document).ready(function () {
            $('.demote-access').click(function(){
                $('#admin-demote').val($(this).data('user_id'));
            });
        });

        $(document).ready(function () {
            $('.reset-password').click(function() {
                $('#password-reset').val($(this).data('user_id'));
            })
        })
    </script>
@endsection