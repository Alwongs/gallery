<x-admin-layout>

    @if(Auth::id() == 1)
        <header class="header">
            <h1>{{ __('Users') }}</h1>
        </header>

        <main class="main">

            <div class="notification-block">
                <x-session-status :status="session('status')" :info="session('info')" />
            </div>
        
            <ul class="manage-list">
                @foreach($users as $user)
                <li class="manage-list__item"> 

                    <div class="manage-list__item-date-time" title="">
                        {{ $user->created_at->setTimezone('Europe/Ulyanovsk')->format("d.m.Y H:i") }}
                    </div> 

                    <div class="manage-list__item-ip" title="">
                        {{ $user->id }}
                    </div>   

                    <div class="manage-list__item-ip" title="">
                        {{ $user->name }}
                    </div>   

                    <div class="manage-list__item-ip" title="">
                        {{ $user->email }}
                    </div> 
                    
                </li>        
                @endforeach
            </ul>          

        </main>
    @endif

</x-admin-layout>
