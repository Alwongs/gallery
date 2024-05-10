<x-site-layout>
    <section class="page-banner">
        <img src="{{ Storage::url('/static/main.jpg') }}" alt="main image" />
        <h2>{{ $album->title }}</h2>
    </section>

    <section class="section">
        <div class="page-container ">
            @if(count($album->photos) != 0)
                <ul class="gallery-list">
                    @foreach ($album->photos as $photo)
                        <li class="album-card">
                            <h3 class="album-card__title">{{ $photo->title }}</h3>
                            <a class="album-card__image" href="{{ route('photo', $photo->id) }}">
                                @if ($photo->image)
                                    <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->image }}" title="{{ $photo->title }}" />
                                @else
                                    <img src="{{ Storage::url('/site/no-picture.jpg') }}" alt="no-picture" title="{{ $photo->title }}" >
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="empty-list-note">{{ __("gallery.no_photos_in_album") }}</p>
            @endif
        </div>
    </section>

<!-- 
    <div class="maintenance">
        <img src="{{ Storage::url('/site/maintenance.jpg') }}" alt="maintenance">
    </div> -->

</x-site-layout>