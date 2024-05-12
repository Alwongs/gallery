<x-admin-layout>
    <header class="header">
        <h1>{{ __('settings.settings') }}</h1>
    </header>

    <main class="main">
        <form class="form" action="{{ route('settings.update', 1) }}" method="POST">
            @method('PUT')
            @csrf

            @include('includes.common.notification')

            @if(count($settings) > 15)
                <div class="form__btn-block">
                    <button type="submit" class="btn btn-green submit">
                        @if(isset($album))
                            Update
                        @else
                            Save
                        @endif
                    </button>
                </div> 
            @endif                             

            @if(count($settings) != 0)
                <ul class="manage-list">
                    @foreach($settings as $setting)
                        <li class="manage-list__item">
 
                            <div class="manage-list__item-title">
                                {{ $setting->code }}
                            </div>

                            <div class="manage-list__item-value">
                                @if($setting->type == 'T')
                                    <input 
                                        type="text" 
                                        name="settings[{{ $setting->code }}]" 
                                        value="{{ $setting->value }}"  
                                    />
                                @elseif($setting->type == 'C')
                                    <input 
                                        type="checkbox" 
                                        name="settings[{{ $setting->code }}]" 
                                        @if($setting->value == "Y") 
                                            value="Y" checked
                                        @endif
                                    />
                                @endif
                            </div> 

                        </li>        
                    @endforeach
                </ul>  
                <div class="form__btn-block">
                    <button type="submit" class="btn btn-green submit">
                        @if(isset($album))
                            Update
                        @else
                            Save
                        @endif
                    </button>
                </div>
            @else
                <p style="color:grey;text-align:center">{{ __("settings.make_settings_migration") }}</p>
            @endif        
        </form>
    </main>

</x-admin-layout>
