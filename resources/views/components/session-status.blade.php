@props(['status', 'info'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'notification error']) }}>
        {{ $status }}
    </div>
@endif

@if ($info)
    <div {{ $attributes->merge(['class' => 'notification info']) }}>
        {{ $info }}
    </div>
@endif
