<li class="album-card">
    <a class="album-card__link" href="{{ route('album', $album->id) }}">
        <h3 class="album-card__title">{{ $album->title }}</h3>
        @if ($album->image)
            <img src="{{ Storage::url('albums/previews/' . $album->image) }}" alt="{{ $album->image }}" title="{{ $album->title }}" />
        @else
            <div class="no-photo-image"></div>
        @endif
    </a>
</li>