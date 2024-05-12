@php
    $types = [
        "T" => "text",
        "C" => "checkbox"
    ];
@endphp

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
                                <input 
                                    name="settings[{{ $setting->code }}]" 
                                    value="{{ $setting->value }}"
                                    type="{{ $types[$setting->type] }}"
                                    @if($setting->type == 'C' && $setting->value == "Y") checked @endif
                                />
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
