<aside id="aside" class="aside">
    <div class="aside__btn-block">
        <button id="aside-btn-close-menu" class="aside__btn-close-menu">
            {{ __("btn.close") }}
        </button>
    </div>
    <div class="aside-navigation">
        <a href="{{ route('locale', __("common.lang_to_set")) }}">
            {{ __("common.current_lang") }}
        </a>
    </div>

    <div class="aside-navigation">
        <h2 class="aside-navigation__title">{{ __("common.website") }}</h2>
        <nav class="aside-navigation__body nav-site">

            <a href="{{ route('home') }}">{{ __("common.home") }}</a>
            <a href="{{ route('gallery') }}">{{ __("gallery.albums") }}</a>
            @auth
                <a href="{{ route('dashboard') }}">{{ __("dashboard.dashboard") }}</a>
            @endauth
        </nav>
    </div>

</aside>