<footer class="footer">
    <div class="footer__row container">
        <div class="footer__col">
            <p>@ Copyright</p>
        </div>

        <div class="footer__col">
            @if ( Illuminate\Support\Facades\Route::currentRouteName() != 'contact-us')
                <a class="contact-us" href="{{ route('contact-us') }}">
                    Contact us
                </a>
            @endif
        </div>

        <div class="footer__col footer-contacts">
            <p>Developed by Alex Wong 2024</p>
        </div>
    </div>
</footer>