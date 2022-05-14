@push('head')
    <link
        href="/favicon.ico"
        id="favicon"
        rel="icon"
    >
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
@endpush

<div class="header">
    <nav class="navbar navbar-expand-lg ">
        <div class="container" >

          <a href="/" class="navbar-brand">
            <img class="header-img" src="img/logo.png" style="margin-bottom: 0"  alt="Logo" title="Logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0" style="font-size: 18px!important;">
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">Home</a>
              </li>

              @auth
                @if (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 2)
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('dash')) ? 'active' : '' }}" href="{{ route('dash') }}">Dashboard</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is('user_dash')) ? 'active' : '' }}" href="{{ route('user_dash') }}">Dashboard</a>
                  </li>
                @endif
              @endauth
              
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('gallery')) ? 'active' : '' }}" href="{{ route('gallery') }}">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('about') }}">About</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="font-size: 18px!important">
              @auth
                
                <li class="nav-item">
                  {{-- <img class="rounded-circle" src="{{ $user->profilePhoto->path }}" width="50" height="50" alt="profile_pic"> --}}
                  <a href="" class="nav-link bg-custom1 d-none d-lg-block">
                    <span class="text-center py-2"><i class="material-icons">notifications_active</i></span>
                    {{ mb_substr(auth()->user()->fname, 0, 1) }}{{ mb_substr(auth()->user()->sname, 0, 1) }}
                  </a>
                </li>
                
                <li class="nav-item">
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="" class="nav-link">
                      <button type="submit" style="all:unset">Logout</button>
                    </a>
                  </form>
                </li>
              @endauth
              
              @guest
                <li class="nav-item ">
                  <a href="{{ route('register') }}" class="nav-link auth-btn {{ (request()->is('register')) ? 'active' : '' }}">Register</a>
                </li>
                <li class="nav-item ">
                  <a href="{{ route('login') }}" class="nav-link auth-btn {{ (request()->is('login')) ? 'active' : '' }}">Login</a>
                </li>
              @endguest
            </ul>
          </div>
        </div>
    </nav>
</div>