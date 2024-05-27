<header class="top-panel">
    <a class="top-panel__home-link" href="/">{{ __("common.home") }}</a>  
    <a id="top-panel-menu-link" class="top-panel__menu-link">{{ _("btn.menu") }} </a>
    
    <form class="top-panel__auth" method="POST" action="{{ route('logout') }}">
        @csrf
        <a 
            href="{{ route('logout') }}" 
            onclick="event.preventDefault();this.closest('form').submit();"
        >
            {{ __('auth.logout') }}
        </a>
    </form>
</header>