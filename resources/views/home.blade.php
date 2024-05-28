<x-site-layout>

    <section class="home-page-banner">
        <h2>{{ __("common.ulyanovsk") }}</h2>
        <a class="home-page-banner__contact-us" href="{{ route('contact-us') }}">
            {{ __("btn.contact_us") }}
        </a>
    </section>


    <section class="section">
        <div class="container">
            <div class="section__title">
                <h2>Recent photos<h2>
            </div>

            @include('blocks.recent-photos')

            <div class="btn-block">
                <a href="{{ route('gallery') }}" class="btn">{{ __("btn.all_photos") }}</a>
            </div>            
        </div>
    </section>


    <section class="section section-map">
        <div class="container">
            <div class="section__title">
                <h2>Ulyanovsk</h2>
            </div>
            <div style="position:relative;overflow:hidden;">
                <a 
                    href="https://yandex.ru/maps/195/ulyanovsk/?utm_medium=mapframe&utm_source=maps" 
                    style="color:#eee;font-size:12px;position:absolute;top:0px;text-decoration:none"
                >
                    {{ __("common.ulyanovsk") }}
                </a>
                <a 
                    href="https://yandex.ru/maps/195/ulyanovsk/?ll=48.403131%2C54.314194&utm_medium=mapframe&utm_source=maps&z=14" 
                    style="color:#eee;font-size:12px;position:absolute;top:14px;"
                >
                    Яндекс Карты — транспорт, навигация, поиск мест
                </a>
                <iframe 
                    src="https://yandex.ru/map-widget/v1/?ll=48.403131%2C54.314194&z=14" 
                    width="100%" 
                    height="500" 
                    frameborder="1" 
                    allowfullscreen="true" 
                    style="position:relative;"
                ></iframe>
            </div>           
        </div>
    </section>           

</x-site-layout>
