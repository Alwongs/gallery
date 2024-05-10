<aside id="aside" class="aside">
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
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @endauth
        </nav>
    </div>

</aside>