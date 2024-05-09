<x-admin-layout>

    @if(Auth::id() == 1)
        <header class="header">
            <h1>{{ __('Vizits') }}</h1>
        </header>

        <main class="main">

            <div class="notification-block">
                <x-session-status :status="session('status')" :info="session('info')" />
            </div>   
            @if(count($vizits) > 0)
            <div class="btn-block">
                <a class="btn btn-red" title="clear table" href="{{ route('clear-vizits') }}?return_url=vizits">
                    Clear table
                </a>
            </div> 
            @endif
        
            <ul class="manage-list">
                @foreach($vizits as $vizit)
                <li class="manage-list__item"> 

                    <div class="manage-list__item-date-time" title="{{ $vizit->user_agent }}">
                        {{ $vizit->created_at->setTimezone('Europe/Ulyanovsk')->format("d.m.Y H:i") }}
                    </div> 

                    <div class="manage-list__item-city" title="{{ $vizit->request_uri }}">
                        <a href="{{ route('vizit', $vizit->id) }}">
                            @if($vizit->ip_address == '176.116.141.115')
                                Evo-73 provider
                            @elseif($vizit->ip_address == '')
                                Bot
                            @elseif($vizit->ip_address == '127.0.0.1')
                                Local
                            @else
                                {{ $vizit->city }}
                            @endif
                        </a>
                    </div>   
                </li>        
                @endforeach
            </ul>   

            <div class="pagination-block">
                {{ $vizits->links() }}
            </div>
        </main>
    @endif

</x-admin-layout>
