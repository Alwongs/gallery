<x-site-layout>

    <section class="page-banner">
        <h2 class="home-title">{{ $photo->title }}</h2>
    </section>

    <section class="container">
        @include('includes.site.breadcrumbs', ['album' => $photo->album])
    </section>

    <section class="section">
        <div class="page-container photo-detail">
            <h3 class="photo-detail__title">{{ $photo->title }}</h3>
            <div class="photo-detail__body">
                <div class="photo-detail__image">
                    @if ($photo->image)
                        <img src="{{ Storage::url('photos/' . App\Helpers\TextHelper::transliterate($photo->album->title) . '/previews/' . $photo->image) }}" alt="{{ $photo->image }}" title="{{ $photo->title }}" />
                    @else
                        <div class="no-photo-image"></div>
                    @endif
                </div>
                <div class="text-container photo-detail__text">
                    {{ $photo->description }}
                </div>
            </div>
        </div>
    </section>

</x-site-layout>