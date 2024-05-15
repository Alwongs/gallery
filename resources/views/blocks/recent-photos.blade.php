@isset($photos)
    <ul class="recent-photos-block">
        @foreach ($photos as $photo)
            <li class="photo-card">
                <h3 class="photo-card__title">{{ $photo->title }}</h3>
                <a class="photo-card__image" href="{{ route('photo', $photo->id) }}">
                    @if ($photo->image)
                        <img src="{{ Storage::url('photos/previews/' . $photo->image) }}" alt="" title="" />
                    @else
                        <div class="no-photo-image"></div>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
@endisset