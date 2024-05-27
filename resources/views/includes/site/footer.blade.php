@php
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName()
@endphp

<footer class="footer">
    <div class="footer__row container">
        <div class="footer__col">
            <p>@ Copyright</p>
        </div>

        <div class="footer__col">
            @if ( $currentRouteName != 'contact-us')
                <a class="contact-us" href="{{ route('contact-us') }}">
                    {{ __("btn.contact_us") }}
                </a>
            @endif
        </div>

        <div class="footer__col footer-contacts">
            <p>{{ __("common.developed_by") }}</p>
        </div>
    </div>
</footer>