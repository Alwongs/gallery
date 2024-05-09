<x-admin-layout>

    @if(Auth::id() == 1)
        <header class="header">
            <h1>{{ __('Message') }}</h1>
        </header>

        <main class="main">

            <div class="notification-block">
                <x-session-status :status="session('status')" :info="session('info')" />
            </div>   
        
            <table class="simple-table">
                <tr>
                    <td class="simple-table__key">datetime:</td>
                    <td>{{ $message->created_at->setTimezone('Europe/Ulyanovsk')->format("d.m.Y H:i") }}</td>
                </tr>    
                <tr>
                    <td class="simple-table__key">name:</td>
                    <td>{{ $message->name }}</td>
                </tr>  
                <tr>
                    <td class="simple-table__key">ip address:</td>
                    <td>{{ $message->ip_address }}</td>
                </tr> 
                <tr>
                    <td class="simple-table__key">city:</td>
                    <td>{{ $message->city }}</td>
                </tr> 
                <tr>
                    <td class="simple-table__key">country:</td>
                    <td>{{ $message->country }}</td>
                </tr>  
                <tr>
                    <td class="simple-table__key">message:</td>
                    <td>{{ $message->message }}</td>
                </tr>   
                <tr>
                    <td class="simple-table__key">user_id:</td>
                    <td>{{ $message->user_id }}</td>
                </tr>   
            </table>

        </main>
    @endif

</x-admin-layout>
