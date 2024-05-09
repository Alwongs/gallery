<header class="top-panel">
    <div class="container top-panel__container">
        <a class="top-panel__home-link" href="/">{{ __("home") }}</a>  
        <a id="top-panel-menu-link" class="top-panel__menu-link">Menu</a>
        
        <nav class="top-panel__navigation">
            <a href="{{ url('blog') }}">Blog</a> 
            <a href="{{ route('gallery') }}">Gallery</a> 
        </nav>
        
        <div class="top-panel__auth">
            @auth
                <a href="{{ route('profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            @else
                <a href="{{ route('login') }}">Login</a>   
                <!-- <a href="{{ route('register') }}" class="">Register</a> -->
            @endauth
        </div>
    </div>
</header>