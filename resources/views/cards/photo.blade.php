<li class="album-card">
    <a class="album-card__link" href="{{ route('photo', $photo->id) }}">
        <h3 class="album-card__title">{{ $photo->title }}</h3>
        @if ($photo->image)
            <img src="{{ Storage::url('photos/' . App\Helpers\TextHelper::transliterate($photo->album->title) . '/previews/' . $photo->image) }}" alt="{{ $photo->image }}" title="{{ $photo->title }}" />
        @else
            <div class="no-photo-image"></div>
        @endif
    </a>
</li>