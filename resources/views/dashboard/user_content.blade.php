@extends('layouts.userdash')

@section('content')
    @include('dashboard.pages.user_profile')


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.edit-profile-photo').click(function(){
            $('#profile-photo-edit').val($(this).data('photo_id'));
            $('#user_profile').val($(this).data('user_id'));
        });
    });
</script>
@endsection