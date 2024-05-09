<x-admin-layout>

    @if(Auth::id() == 1)
        <header class="header">
            <h1>{{ __('Vizit') }}</h1>
        </header>

        <main class="main">

            <div class="notification-block">
                <x-session-status :status="session('status')" :info="session('info')" />
            </div>   
        
            <table class="simple-table">
                <tr>
                    <td class="simple-table__key">ip_address:</td>
                    @if($vizit->request_uri == '/dashboard')
                        <td style="color:red;">{{ $vizit->ip_address }}</td>
                    @else
                        <td>{{ $vizit->ip_address }}</td>
                    @endif
                </tr>   
                <tr>
                    <td class="simple-table__key">country:</td>
                    <td>{{ $vizit->country }}</td>
                </tr> 
                <tr>
                    <td class="simple-table__key">city:</td>
                    <td>{{ $vizit->city }}</td>
                </tr> 
                <tr>
                    <td class="simple-table__key">user_agent:</td>
                    <td>{{ $vizit->user_agent }}</td>
                </tr>  
                <tr>
                    <td class="simple-table__key">request_uri:</td>
                    <td>{{ $vizit->request_uri }}</td>
                </tr>  
                <tr>
                    <td class="simple-table__key">query_string:</td>
                    <td>{{ $vizit->query_string }}</td>
                </tr>  
            </table>

        </main>
    @endif

</x-admin-layout>
