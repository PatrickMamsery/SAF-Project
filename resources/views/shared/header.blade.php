<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="padding: 0!important">
        <div class="container-fluid">

          <a href="/" class="navbar-brand my-2">
            <img src="img/logo.png" style="margin-bottom: 0" height="50" width="50" alt="Logo" title="Logo">
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0" style="font-size: 18px!important;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>

              @auth
                @if (auth()->user()->user_role_id == 1 || auth()->user()->user_role_id == 2)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('dash') }}">Dashboard</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('user_dash') }}">Dashboard</a>
                  </li>
                @endif
              @endauth
              
              <li class="nav-item">
                <a class="nav-link" href="{{ route('gallery') }}">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0" style="font-size: 18px!important">
              @auth
                <li class="nav-item">
                  <a href="" class="nav-link">{{ auth()->user()->fname }} {{ auth()->user()->sname }}</a>
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
                <li class="nav-item">
                  <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('login') }}" class="nav-link">Login</a>
                </li>
              @endguest
            </ul>
          </div>
        </div>
    </nav>
</div>