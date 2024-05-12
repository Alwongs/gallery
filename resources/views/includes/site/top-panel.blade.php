@php
    use Illuminate\Support\Facades\Route;
    $gallery_routes = ['gallery', 'album', 'photo'];
@endphp

<header class="top-panel">
    <div class="container top-panel__container">
        <a id="top-panel-menu-link" href="#" class="top-panel__menu-link">{{ __("menu") }}</a>

        <nav class="top-panel__navigation">
            <a class="top-panel__home-link" href="/">{{ __("home") }}</a>  

            @if (in_array(Route::currentRouteName(), $gallery_routes))
                <a href="{{ route('gallery') }}" class="active">{{ __("gallery.albums") }}</a> 
            @else
                <a href="{{ route('gallery') }}" >{{ __("gallery.albums") }}</a> 
            @endif

            @Auth
                <a href="{{ route('dashboard') }}">Dashboard</a> 
            @endauth
        </nav>
        
        <div class="top-panel__auth">

            @auth
                <a href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            @else
                <a href="{{ route('login') }}">Login</a> 
            @endauth
        </div>
    </div>
</header>
