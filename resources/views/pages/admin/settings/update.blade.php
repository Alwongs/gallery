<x-admin-layout>

    @auth
        @if(Auth::user()->is_root)
            <header class="header">
                <h1>{{ __('Settings') }}</h1>
            </header>

            <main class="main">

                <div class="notification-block">
                    <x-session-status :status="session('status')" :info="session('info')" />
                </div>   
            
                <form class="form-settings" method="POST"  action="{{ route('settings.update', $setting->id) }}" > 
                    @method('PUT')
                    @csrf 

                    <div class="form-settings__element">
                        <label class="form-settings__element-label">Is site open:</label>
                        <div class="flex-connection"></div>
                        <div class="form-settings__element-input-block">
                            @if($setting->is_site_open == 1)
                                <input class="form-settings__element-checkbox" type="checkbox" name="is_site_open" value="1" checked/>
                            @else
                                <input class="form-settings__element-checkbox" type="checkbox" name="is_site_open" value="0"/>
                            @endif                            
                        </div>
                    </div> 

                    <div class="form-settings__element">
                        <label class="form-settings__element-label">Items per page (admin panel):</label>
                        <div class="flex-connection"></div>
                        <div class="form-settings__element-input-block">
                            <input
                                class="form-settings__element-input"
                                type="text"
                                name="admin_items_per_page"
                                @if($setting->admin_items_per_page)
                                    value="{{ $setting->admin_items_per_page }}"
                                @endif
                            />
                        </div>  
                    </div>  

                    <div class="form-settings__element">
                        <label class="form-settings__element-label">Items per page (site):</label>
                        <div class="flex-connection"></div>
                        <div class="form-settings__element-input-block">
                            <input
                                class="form-settings__element-input"
                                type="text" 
                                name="site_items_per_page" 
                                @if($setting->site_items_per_page) 
                                    value="{{ $setting->site_items_per_page }}" 
                                @endif
                            />
                        </div>  
                    </div>  

                    <button type="submit" class="btn">{{ __("Save") }}</button>
                </form>

            </main>
        @endif
    @endauth

</x-admin-layout>
