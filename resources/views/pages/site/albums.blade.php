<x-site-layout>
    
    <section class="page-banner">
        <h2 class="home-title">{{ __("gallery.albums") }}</h2>
    </section>

    <section class="container">
        @include('includes.site.breadcrumbs')
    </section>

    <section class="section">
        <div class="page-container">
            @if(count($albums) != 0)
                <ul class="gallery-list">
                    @foreach ($albums as $album)
                        @include('cards.album')
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

</x-site-layout>