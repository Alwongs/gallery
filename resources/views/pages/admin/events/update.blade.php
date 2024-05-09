<x-admin-layout>
    <header class="header">
        <h1>@isset($event){{ __('Update') }}@else{{ __('New event') }}@endisset</h1>
    </header>

    <main class="main ">

        <div class="notification-block">
            <x-session-status :status="session('status')" :info="session('info')" />

            @if ($errors->any())
            <ul class="request-validation-errors">
                @foreach ($errors->all() as $error)
                <li>Request error: {{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>


        @if(isset($event))
        <form class="form" action="{{ route('events.update', $event) }}" method="POST">
            @method('PUT')
        @else
        <form class="form" action="{{ route('events.store') }}" method="POST">
        @endif

            @csrf

            <input type="hidden" name="return_url" value="{{ $return_url }}">

            <div class="form__input-block">
                <input name="event" type="text" placeholder="event" value="{{ isset($event) ? $event->event : '' }}" />
            </div>    

            <div class="form__textarea-block">
                <textarea name="description" placeholder="description">{{ isset($event) ? $event->description : '' }}</textarea>
            </div>

            <div class="form__input-block input-date-block">
                @include('components.date-picker')                     
            </div>

            <div class="form__input-block input-type-block">
                <select name="type" type="text" placeholder="type" required >
                    @if(isset($event) && $event->type == 'U')<option value="U" selected>unique</option>@else<option value="U">unique</option>@endif                    
                    @if(isset($event) && $event->type == 'M')<option value="M" selected>monthly</option>@else<option value="M">monthly</option>@endif
                    @if(isset($event) && $event->type == 'A')<option value="A" selected>annual</option>@else<option value="A">annual</option>@endif
                </select>
            </div>  

            <div class="form__btn-block">
                <button type="submit" class="btn btn-green">
                    @if(isset($event))
                        Update
                    @else
                        Save
                    @endif
                </button>
            </div>
        </form>

    </main>

</x-admin-layout>


