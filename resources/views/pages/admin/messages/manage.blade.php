<x-admin-layout>

    @if(Auth::id() == 1)

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
                        <a href="{{ route('message', $message->id) }}">
                            {{ $message->name }}
                        </a>
                    </div>   

                    <div class="manage-list__item-ip" title="">
                        {{ $message->country }}
                    </div>   

                    <div class="manage-list__item-ip" title="">
                        {{ $message->city }}
                    </div> 

                    <form action="{{ route('destroy-message', $message->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cell-btn btn-icon-delete"></button> 
                    </form>   
                </li>        
                @endforeach
            </ul>          

        </main>
    @endif

</x-admin-layout>
