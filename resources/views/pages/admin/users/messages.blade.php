<x-admin-layout>

    @if(Auth::id() == 1)
        <header class="header">
            <h1>{{ __('Messages') }}</h1>
        </header>

        <main class="main">

            <div class="notification-block">
                <x-session-status :status="session('status')" :info="session('info')" />
            </div>   
            @if(count($messages) > 0)
                <a href="{{ route('clear-messages') }}" class="btn btn-red" title="clear table">
                    Clear table
                </a>
            @endif
        
            <ul class="manage-list">
                @foreach($messages as $message)
                <li class="manage-list__item"> 

                    <div class="manage-list__item-date-time" title="">
                        {{ $message->created_at->setTimezone('Europe/Ulyanovsk')->format("d.m.Y H:i") }}
                    </div> 

                    <div class="manage-list__item-ip" title="">
                        {{ $message->name }}
                    </div>   

                    <div class="manage-list__item-ip" title="">
                        {{ $message->country }}
                    </div>   

                    <div class="manage-list__item-ip" title="">
                        {{ $message->city }}
                    </div> 

                    <a href="{{ route('message', $message->id) }}">Look</a>

                </li>        
                @endforeach
            </ul>          

        </main>
    @endif

</x-admin-layout>
