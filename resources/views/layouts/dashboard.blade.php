<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SAFProject') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/css/custom.css"> --}}
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/snackbar.min.css">
    
    {{-- <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e62d1f73cb.js" crossorigin="anonymous"></script>
    <script src="/packages/snackbar/dist/snackbar.min.js"></script>

</head>
<body>
    <div>
        @include('./shared.dashboardHeader')
        <div class="main-layout">
            <div class="side-bar">

                <ul class="nav-links-list">
        
                    <li class="admin-title">
                        <div class="admin-info">
                            <p>Welcome</p>
                            <p class="admin-name">{{Auth::guard('web')->user()?Auth::guard('web')->user()->fname.' '.Auth::guard('web')->user()->sname:'Guest User'}}</p>
                    </div>
                    </li>
          
                    <li class="nav-link {{\Request::path()=='dashboard'?'saf-active':''}}">

                        <a href="/"><i class="fa fa-dashboard"></i>Dashboard</a>
                    </li>
                   

                    @if(Auth::guard('web')->user())
                    
                    <li class="nav-link {{\Request::path()=='posts'?'saf-active':''}}">

                        <a href="/posts"><i class="fa-solid fa-layer-group"></i>Posts</a>
                    </li>
                  
                    <li class="nav-link">
                        <a href="#"><i class="fas fa-cog"></i>Settings</a>
                    </li>

                    <li class="nav-link">
                        <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                    @endif

                    @if(!Auth::check())
                    <li class="nav-link">
                        <a href="/auth"><i class="fas fa-sign-in-alt"></i>Login</a>
                    </li>
                    @endif
                   
                </ul>
            </div>
            <div class="main-content">
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
        </div>
    </div>
</body>


    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{url('js/lib/bootstrap-tagsinput.min.js')}}"></script>
    
</html>
