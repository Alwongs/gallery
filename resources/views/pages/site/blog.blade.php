<x-site-layout>
    <section class="section-banner">
        <img src="{{ Storage::url('/site/main.jpg') }}" alt="main image" />
        <h2 class="home-title">Blog</h2>
    </section>

    <section class="section">
        <main class="main blog-page">
            @isset($posts)
                <ul class="blog-list">
                    @foreach($posts as $post)
                        @include('pages.site.post-card')  
                    @endforeach
                </ul>
            @endisset

            <div class="pagination-block">
                {{ $posts->links() }}
            </div>
        </main>
    </section>

</x-site-layout>