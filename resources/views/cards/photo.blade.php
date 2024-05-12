<li class="album-card">
    <a class="album-card__link" href="{{ route('photo', $photo->id) }}">
        <h3 class="album-card__title">{{ $photo->title }}</h3>
        @if ($photo->image)
            <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->image }}" title="{{ $photo->title }}" />
        @else
            <img src="{{ Storage::url('/site/no-picture.jpg') }}" alt="no-picture" title="{{ $photo->title }}" >
        @endif
    </a>
</li>