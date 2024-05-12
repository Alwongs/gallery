<ul class="breadcrumbs">

    <li class="breadcrumbs__item hide-in-mobile">You are here:</li> 

    <li class="breadcrumbs__item">
        <a href="{{ route('home') }}">Home</a>
    </li>

    @foreach($breadcrumbs as $item)
        @if(!empty($item))
            <li class="breadcrumbs__item">/</li>
                <li class="breadcrumbs__item">

                @if(!empty($item['route']))<a href="{{ $item['route'] }}">@endif
                    {{ $item['value'] }}
                @if(!empty($item['route']))</a>@endif
            </li>
        @endif
    @endforeach

</ul>
