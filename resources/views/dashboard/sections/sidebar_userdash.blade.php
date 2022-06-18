<div class="l-navbar" id="nav-bar">
    <nav class="sidebar__nav">
        <div> 
            <a href="/user/user_profile/{{ auth()->user()->id }}" class="nav__logo"> 
                <i class='bx bx-user-circle nav__logo-icon'></i> 
                <span class="nav__logo-name">{{ $user->fname }} {{ $user->sname }}</span> 
            </a>
            <div class="nav__list">
                <a href="/" class="nav__link active"> 
                    <i class='bx bx-home nav__icon'></i> 
                    <span class="nav__name">Back</span> 
                </a>
                <a href="#" class="nav__link"> 
                    <i class='bx bx-message-square-detail nav__icon'></i> 
                    <span class="nav__name">Messages</span> 
                </a> 

                @if(Auth::guard('web')->user())

                <a href="/user/posts/{{ auth()->user()->id }}" class="nav__link"> 
                    <i class='bx bx-paper-plane nav__icon'></i> 
                    <span class="nav__name">Posts</span> 
                </a>
                <a href="#" class="nav__link"> 
                    <i class='bx bx-images nav__icon'></i> 
                    <span class="nav__name">Images</span> 
                </a>
                <a href="#" class="nav__link"> 
                    <i class='bx bx-video nav__icon'></i> 
                    <span class="nav__name">Videos</span> 
                </a> 
            </div>
        </div> 
        <a href="{{ route('logout') }}" class="nav__link"> 
            <i class='bx bx-log-out nav__icon'></i> 
            <span class="nav__name">Logout</span> 
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endif

    </nav>
</div>