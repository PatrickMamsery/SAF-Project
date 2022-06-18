@extends('layouts.userdash')

@section('content')

    @include('dashboard.sections.user_posts')

@endsection

@section('user-defined-scripts')

    <script>
        $(document).ready(function () {
            $('.delete-photo').click(function(){
                // alert($(this).data('photo_id'));
                $('#photo-delete').val($(this).data('photo_id'));
            });
        });

        $(document).ready(function () {
            $('.view-photo').click(function(){
                // alert($(this).data('photo_id'));
                $('#photo-view').attr("src", $(this).data('photo_path'));
            });
        });
    </script>

@endsection