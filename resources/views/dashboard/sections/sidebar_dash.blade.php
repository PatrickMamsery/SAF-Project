<div class="l-navbar" id="nav-bar">
    <nav class="sidebar__nav">
        <div> 
            <a href="#" class="nav__logo"> 
                <i class='bx bx-leaf nav__logo-icon'></i> 
                <span class="nav__logo-name">St. Augustine Family</span> 
            </a>
            <div class="nav__list">
                 <a href="/" class="nav__link active"> 
                    <i class='bx bx-home nav__icon'></i> 
                    <span class="nav__name">Website</span> 
                </a> 
                <a href="{{ route('dash') }}" class="nav__link"> 
                    <i class='bx bx-group nav__icon'></i> 
                    <span class="nav__name">Users</span> 
                </a> 
                <a href="{{ route('info_list') }}" class="nav__link"> 
                    <i class='bx bx-news nav__icon'></i> 
                    <span class="nav__name">Info</span> 
                </a> 

                @if(Auth::guard('web')->user())

                <a href="{{ route('posts') }}" class="nav__link"> 
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
                {{-- <a href="#" class="nav_link"> 
                    <i class='bx bx-folder nav_icon'></i> 
                    <span class="nav_name">Files</span> 
                </a>  --}}
                <a href="#" class="nav__link"> 
                    <i class='bx bx-bar-chart-alt-2 nav__icon'></i> 
                    <span class="nav__name">Stats</span> 
                </a>
                <a href="{{ route('logout') }}" class="nav__link"> 
                    <i class='bx bx-log-out nav__icon'></i> 
                    <span class="nav__name">Logout</span> 
                </a> 
            </div>
        </div> 
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endif

    </nav>
</div>