<aside id="aside" class="website__aside aside">
    <div class="aside__btn-block">
        <button id="aside-btn-close-menu" class="aside__btn-close-menu">
            Close
        </button>
    </div>

    <div class="aside-navigation">
        <h2 class="aside-navigation__title">Navigation</h2>
        <nav class="aside-navigation__body nav-site">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('gallery') }}">Gallery</a>
        </nav>
    </div>

    @auth
    <div class="aside-navigation">
        <h2 class="aside-navigation__title">Admin panel</h2>
        <nav class="aside-navigation__body nav-admin">
            
            <a href="{{ route('dashboard') }}">Dashboard</a>

            @if (Auth::user()->is_root)
                <a href="{{ route('albums.index') }}">
                    <span>Albums</span>
                </a>
                <a href="{{ route('photos.index') }}">
                    <span>Photos</span>
                </a>

                <a href="{{ route('settings.index') }}">
                    <span>Settings</span>
                </a>

                <a href="{{ route('messages') }}">
                    <span>Messages </span>
                    @if(Session::get('messageCount'))
                        <span style="color:green;fomt-weight:600;">
                            {{ Session::get('messageCount')}}
                        </span>
                    @endif
                </a>                
            @endif
        </nav>
    </div>
    @endauth
</aside>