<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/snackbar.min.css">

    <script src="/packages/snackbar/dist/snackbar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
</head>
<body id="body-pd" class="dash__body">
    <header class="dash__header" id="header">
        <div class="header__toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header__img"> 
            @if ($user->gender == 'male')
                <img src="img/profile_photos/avatar.png" alt="user_profile">
            @elseif ($user->gender == 'female')
                <img src="img/profile_photos/avatar-female.png" alt="user_profile">
            @else
                <img src="/img/logo.png" alt="user_profile">
            @endif
            <!--<i class="bx bx-user-circle"></i> -->
        </div>
    </header>
    
    @include('dashboard.sections.sidebar_dash')
    
    <!--Container Main start-->
    <div class="content">
        @if(session('msg'))
            <script>
                Snackbar.show({
                    text: '{{ session('msg') }}',
                    pos: 'bottom-center',
                    actionTextColor: '#EC902E'
                });
            </script>
        @endif
        @yield('info')
        <div id="loader">
            {{-- <img src="/icons/Settings.gif" alt="Loading..."> --}}
        </div>
    </div>
    <!--Container Main end-->

    <script src="/js/dash.js"></script>
    
    @yield('third-party-scripts')

    <script src="{{ asset('js/multipleSelect.js') }}"></script>
    <script src="{{ asset('js/multipleUsersSelect.js') }}"></script>
    
    <script>
        // $(window).ready(function() {
        //     $('#loader').show();
        // })
        $(window).on('load', function () {
            console.log("Loading...")
            $('#loader').hide();
        });
        
        $(document).ready(function () {
            $('.delete-photo').click(function(){
                $('#photo-delete').val($(this).data('photo_id'));
            });
        });
    </script>
