<div class="notification-block">
    <x-session-status :status="session('status')" :info="session('info')" />

    @if ($errors->any())
    <ul class="request-validation-errors">
        @foreach ($errors->all() as $error)
        <li>{{ __("common.request_error") }}: {{ $error }}</li>
        @endforeach
    </ul>
    @endif
</div>