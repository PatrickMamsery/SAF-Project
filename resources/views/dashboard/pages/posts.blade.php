@extends('layouts.dash')

@section('info')

    @include('dashboard.sections.posts')

@endsection

@section('third-party-scripts')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    

    <script>
        $(document).ready(function () {
            $('.delete-photo').click(function(){
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