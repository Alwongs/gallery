<x-site-layout>

    <section class="home-page-banner">
        <h2>{{ __("common.ulyanovsk") }}</h2>
        <a class="home-page-banner__contact-us" href="{{ route('contact-us') }}">
            {{ __("btn.contact_us") }}
        </a>
    </section>


    <section class="section">
        <div class="container">
            <x-section-title>
                  {{ __("common.recent-photos") }}
            </x-section-title>

            @include('blocks.recent-photos')

            <div class="btn-block">
                <a href="{{ route('gallery') }}" class="btn">{{ __("btn.all_photos") }}</a>
            </div>            
        </div>
    </section>


    <section class="section section-map">
        <div class="container">
            <x-section-title>
                {{ __("common.ulyanovsk") }}
            </x-section-title>

            @include('blocks.yandex-map')
        </div>
    </section>           

</x-site-layout>
