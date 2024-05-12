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