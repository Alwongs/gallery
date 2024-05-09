<x-site-layout>
    <section class="section-banner">
        <img src="{{ Storage::url('/site/main.jpg') }}" alt="main image" />
        <h2 class="home-title">Gallery</h2>
    </section>

    <section class="section">
        <div class="container">
            @if(count($albums) != 0)
                <ul class="gallery-list">
                    @foreach ($albums as $album)
                        <li class="album-card">
                            <h3 class="album-card__title">{{ $album->title }}</h3>
                            <a class="album-card__image" href="{{ route('album', $album->id) }}">
                                @if ($album->image)
                                    <img src="{{ Storage::url($album->image) }}" alt="{{ $album->image }}" title="{{ $album->title }}" />
                                @else
                                    <img src="{{ Storage::url('/site/no-picture.jpg') }}" alt="no-picture" title="{{ $album->title }}" >
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="empty-list-note">{{ __("gallery.no_albums") }}</p>
            @endif

            <div class="pagination-block">
                {{ $albums->links() }}
            </div>
        </div>
    </section>

<!-- 
    <div class="maintenance">
        <img src="{{ Storage::url('/site/maintenance.jpg') }}" alt="maintenance">
    </div> -->

</x-site-layout>