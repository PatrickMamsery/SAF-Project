<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash | User</title>
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
            @if ($user->profilePhoto != NULL)
                <img src="{{ $user->profilePhoto->path }}" alt="user_profile">
            @elseif($user->profilePhoto == NULL)
                @if ($user->gender == 'male')
                    <img src="img/profile_photos/avatar.png" alt="user_profile">
                @elseif ($user->gender == 'female')
                    <img src="img/profile_photos/avatar-female.png" alt="user_profile">
                @else
                    <img src="img/profile_photos/avatar.png" alt="user_profile">
                @endif
            @endif
            <!--<i class="bx bx-user-circle"></i> -->
        </div>
    </header>

    @include('dashboard.sections.sidebar_userdash')
   
   <!--Container Main start-->
    <div class="content bg-light height-100">
        {{-- <h4>Main Components</h4> --}}
        @if(session('msg'))
            <script>
                Snackbar.show({
                    text: '{{ session('msg') }}',
                    pos: 'bottom-center',
                    actionTextColor: 'green'
                });
            </script>
        @endif
        @yield('content')
    </div>
    <!--Container Main end-->

    <script src="/js/dash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="{{ asset('js/multipleSelect.js') }}"></script>

    @yield('user-defined-scripts')