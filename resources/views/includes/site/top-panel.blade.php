@php
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<header class="top-panel">
    <div class="container top-panel__container">
        <a id="top-panel-menu-link" href="#" class="top-panel__menu-link">{{ __("btn.menu") }}</a>

        <nav class="top-panel__navigation">
            <a href="{{ route('locale', __("common.lang_to_set")) }}">
                {{ __("common.current_lang") }}
            </a>

            <a class="top-panel__home-link" href="/">
                {{ __("common.home") }}
            </a>  

            <a 
                href="{{ route('gallery') }}" 
                @if (in_array($currentRouteName, ['gallery', 'album', 'photo'])) class="active" @endif
            >
                {{ __("gallery.albums") }}
            </a> 
            
            @Auth
                <a href="{{ route('dashboard') }}">
                    {{ __("dashboard.dashboard") }}
                </a> 
            @endauth
        </nav>
        
        <div class="top-panel__auth">
            @auth
                <a href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            @else
                <a href="{{ route('login') }}">{{ __("auth.login") }}</a> 
            @endauth
        </div>
    </div>
</header>
