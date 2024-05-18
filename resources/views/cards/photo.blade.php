<li class="blog-page-item">


    <div class="blog-page-item__content">
        <div class="blog-page-item__image">
            <a class="" href="{{ route('photo', $photo->id) }}">
            @if ($photo->image)
                <img src="{{ Storage::url('photos/' . App\Helpers\TextHelper::transliterate($photo->album->title) . '/previews/' . $photo->image) }}" alt="{{ $photo->image }}" title="{{ $photo->title }}" />
            @else
                <div class="no-photo-image"></div>
            @endif
            </a>
        </div>
        <div class="blog-page-item__text">
            <div class="blog-page-item__header">
                <h3 class="blog-page-item__title">{{ $photo->title }}</h3>
                {{-- <a class="blog-page-item__created-at" href="#">{{ $photo->created_at }}</a> --}}
            </div>

            <p class="blog-page-item__description">{{ $photo->description }}</p>
            
            <a class="blog-page-item__footer" href="{{ route('photo', $photo->id) }}">Read more</a>
        </div>
    </div>

</li>
