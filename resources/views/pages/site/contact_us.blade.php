<x-site-layout>
    <section class="page-banner">
        <h2 class="home-title">{{ __('message.contact_us') }}</h2>
    </section>

    <section class="container">
        @include('includes.site.breadcrumbs')
    </section>

    <section class="main page-container">

        @include('includes.common.notification')

        <h2 class="main__title">Type message for author</h2>

        <form class="form" action="{{ route('store-message') }}" method="POST">
            @csrf
            <div class="form__input-block">
                <input name="name" type="text" placeholder="name" value="" />
            </div>    

            <div class="form__textarea-block">
                <textarea name="message" placeholder="message"></textarea>
            </div>

            <div class="form__btn-block btn-block">
                <button type="submit" class="btn btn-green">
                    {{__("Send")}}
                </button>
            </div>
        </form>
    </section>
</x-site-layout>


