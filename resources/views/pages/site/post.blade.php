<x-site-layout>
    <section class="section-banner">
        <img src="{{ Storage::url('/site/main.jpg') }}" alt="main image" />
        <h2 class="home-title">Blog</h2>
    </section>

    <section class="section">
        <main class="main post-page">
            @isset($post)
                <h1 class="post-page__title">{{ $post->post }}</h1>

                <div class="post-page__image">
                    @if ($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="" title="" />
                    @else
                        <img src="/images/default-post-image.jpg" alt="" title="" >
                    @endif
                </div>     
                    
                <p class="post-page__description">{{ $post->description }}</p>

                <div class="post-page__footer">
                    <a class="post-page__created-at" href="#">{{ $post->created_at }}</a>
                    <a class="post-page__author" href="#">{{ $post->user->name }}</a>
                </div>            
            @endisset
        </main>
    </section>

</x-site-layout>