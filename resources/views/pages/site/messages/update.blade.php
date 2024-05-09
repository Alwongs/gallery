<x-site-layout>
    <section class="section-banner">
        <img src="{{ Storage::url('/site/main.jpg') }}" alt="main image" />
        <h2 class="home-title">Ulyanovsk</h2>
    </section>

    <header class="header">
        <h1>{{ __('New message') }}</h1>
    </header>

    <main class="main ">
        <div class="notification-block">
            <x-session-status :status="session('status')" :info="session('info')" />

            @if ($errors->any())
            <ul class="request-validation-errors">
                @foreach ($errors->all() as $error)
                <li>Request error: {{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <form class="form" action="{{ route('store-message') }}" method="POST">
            @csrf
            <div class="form__input-block">
                <input name="name" type="text" placeholder="message" value="" />
            </div>    

            <div class="form__textarea-block">
                <textarea name="message" placeholder="description"></textarea>
            </div>

            <div class="form__btn-block">
                <button type="submit" class="btn btn-green">
                    {{__("Send")}}
                </button>
            </div>
        </form>
    </main>
</x-site-layout>


