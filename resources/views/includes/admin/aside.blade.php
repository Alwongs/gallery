@php
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName();
@endphp

<aside id="aside" class="website__aside aside">
    <div class="aside__btn-block">
        <button id="aside-btn-close-menu" class="aside__btn-close-menu">
            {{ _("btn.close") }}
        </button>
    </div>

    <div class="aside-navigation">
        <h2 class="aside-navigation__title">
            {{ __("common.website") }}
        </h2>
        <nav class="aside-navigation__body nav-site">
            <a href="{{ route('home') }}">{{ __("common.home") }}</a>
            <a href="{{ route('gallery') }}">{{ __("gallery.albums") }}</a>
        </nav>
    </div>

    @auth
        <div class="aside-navigation">
            <h2 class="aside-navigation__title">{{ __("common.admin_panel") }}</h2>
            <nav class="aside-navigation__body nav-admin">
                
                <a 
                    href="{{ route('dashboard') }}"
                    @if (in_array($currentRouteName, ['dashboard'])) class="active" @endif
                >
                    {{ __("dashboard.dashboard") }}
                </a>

                <a 
                    href="{{ route('albums.index') }}"
                    @if (in_array($currentRouteName, ['albums.index', 'albums.create', 'albums.edit'])) class="active" @endif                    
                >
                    {{ __("gallery.albums") }}
                </a>

                <a 
                    href="{{ route('photos.index') }}"
                    @if (in_array($currentRouteName, ['photos.index', 'photos.create', 'photos.edit'])) class="active" @endif                     
                >
                    {{ __("gallery.photos") }}                   
                </a>

                <a 
                    href="{{ route('comments.index') }}"
                    @if (in_array($currentRouteName, ['comments.index', 'comments.create', 'comments.edit'])) class="active" @endif                     
                >
                    {{ __("gallery.comments") }}                   
                </a>                

                <a 
                    href="{{ route('messages') }}"
                    @if (in_array($currentRouteName, ['messages', 'message'])) class="active" @endif                     
                >
                    {{ __("message.messages") }}
                    @if(Session::get('messageCount'))
                        <span style="color:green;fomt-weight:600;">
                            {{ Session::get('messageCount')}}
                        </span>
                    @endif
                </a>   

                <a 
                    href="{{ route('settings.index') }}"
                    @if (in_array($currentRouteName, ['settings.index'])) class="active" @endif                    
                >
                    {{ __("settings.settings") }}                       
                </a>
            </nav>
        </div>
    @endauth
</aside>