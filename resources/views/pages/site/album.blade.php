<x-site-layout>

    <section class="page-banner">
        <img src="{{ Storage::url('/static/main.jpg') }}" alt="main image" />
        <h2>{{ $album->title }}</h2>
    </section>

    <section class="container">
        @include('includes.site.breadcrumbs', ['album' => $album])
    </section>

    <section class="section">
        <div class="page-container ">
            @if(count($photos) != 0)
                <ul class="gallery-list">
                    @foreach ($photos as $photo)
                        @include('cards.photo')
                    @endforeach
                </ul>
            @else
                <p class="empty-list-note">{{ __("gallery.no_photos_in_album") }}</p>
            @endif

            <div class="pagination-block">
                {{ $photos->links() }}
            </div>
        </div>
    </section>

</x-site-layout>