<x-site-layout>

    <section class="page-banner">
        <img src="{{ Storage::url('/static/main.jpg') }}" alt="main image" />
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
                        <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->image }}" title="{{ $photo->title }}" />
                    @else
                        <img src="{{ Storage::url('/site/no-picture.jpg') }}" alt="no-picture" title="{{ $photo->title }}" >
                    @endif
                </div>
                <div class="text-container photo-detail__text">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis, veniam voluptates sequi odio expedita voluptatum culpa cum ea tempore accusamus ad tempora asperiores vitae. Officiis ex nisi tenetur eveniet? Similique?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis, veniam voluptates sequi odio expedita voluptatum culpa cum ea tempore accusamus ad tempora asperiores vitae. Officiis ex nisi tenetur eveniet? Similique?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis, veniam voluptates sequi odio expedita voluptatum culpa cum ea tempore accusamus ad tempora asperiores vitae. Officiis ex nisi tenetur eveniet? Similique?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis, veniam voluptates sequi odio expedita voluptatum culpa cum ea tempore accusamus ad tempora asperiores vitae. Officiis ex nisi tenetur eveniet? Similique?</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis, veniam voluptates sequi odio expedita voluptatum culpa cum ea tempore accusamus ad tempora asperiores vitae. Officiis ex nisi tenetur eveniet? Similique?</p>
                </div>
            </div>
        </div>
    </section>

</x-site-layout>