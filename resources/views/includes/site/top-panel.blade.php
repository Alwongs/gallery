@php
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<header class="top-panel">
    <div class="container top-panel__container">
        <a id="top-panel-menu-link" href="#" class="top-panel__menu-link">{{ __("btn.menu") }}</a>

        <nav class="top-panel__navigation">

            <a 
                href="{{ route('locale', __("common.lang_to_set")) }}"
                class="top-panel__locale"
            >
                {{ __("common.current_lang") }}
            </a>

            <a class="top-panel__link top-panel__home-link" href="/">
                {{ __("common.home") }}
            </a>  

            <a 
                href="{{ route('gallery') }}" 
                @if (in_array($currentRouteName, ['gallery', 'album', 'photo']))
                    class="top-panel__link active"
                @else
                    class="top-panel__link"
                @endif 
            >
                {{ __("gallery.albums") }}
            </a> 
            
            @Auth
                <a 
                    href="{{ route('dashboard') }}"
                    class="top-panel__link"
                >
                    {{ __("dashboard.dashboard") }}
                </a> 
            @endauth
        </nav>
        
        <div class="top-panel__auth">
            @auth
                <a class="top-panel__link" href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            @else
                <a class="top-panel__link" href="{{ route('login') }}">{{ __("auth.login") }}</a> 
            @endauth
        </div>
    </div>
</header>
