<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dash</title>
    <link rel="stylesheet" href="/css/dash.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/snackbar.min.css">

    <script src="/packages/snackbar/dist/snackbar.min.js"></script>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> 
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
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-leaf nav_logo-icon'></i> 
                    <span class="nav_logo-name">St. Augustine Family</span> 
                </a>
                <div class="nav_list">
                     <a href="/" class="nav_link active"> 
                         <i class='bx bx-home nav_icon'></i> 
                         <span class="nav_name">Back</span> 
                    </a>
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">Messages</span> 
                    </a> 

                    @if(Auth::guard('web')->user())

                    <a href="#posts" class="nav_link"> 
                        <i class='bx bx-paper-plane nav_icon'></i> 
                        <span class="nav_name">Posts</span> 
                    </a>
                    <a href="#photo_posts" class="nav_link"> 
                        <i class='bx bx-images nav_icon'></i> 
                        <span class="nav_name">Images</span> 
                    </a>
                    <a href="#videos" class="nav_link"> 
                        <i class='bx bx-video nav_icon'></i> 
                        <span class="nav_name">Videos</span> 
                    </a> 
                </div>
            </div> 
            <a href="{{ route('logout') }}" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">Logout</span> 
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @endif

        </nav>
    </div>
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