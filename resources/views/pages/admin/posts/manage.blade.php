<x-admin-layout>
    <header class="header">
        <h1>{{ __('Posts') }}</h1>
    </header>

    <main class="main">

        <div class="notification-block">
            <x-session-status :status="session('status')" :info="session('info')" />
        </div>    

        <div class="add-btn-group">
            <a class="add-btn btn-icon-add" title="add new post" href="{{ route('posts.create') }}?return_url=posts.index"></a>
        </div> 

        <ul class="manage-list">
            @foreach($posts as $post)
            <li class="manage-list__item">
                <div class="manage-list__item-image">
                    <img src="{{ Storage::url($post->image) ?: '' }}" alt="{{ $post->image }}" />
                </div>  

                <div class="manage-list__item-title">{{ $post->post }}</div> 

                <div class="manage-list__item-date">{{ date("d.m.Y", strtotime($post->created_at)) }}</div>

                <a href="{{ route('posts.edit', $post->id) }}" class="cell-btn btn-icon-edit"></a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button href="{{ route('posts.destroy', $post->id) }}" class="cell-btn btn-icon-delete"></button> 
                </form>     
            </li>        
            @endforeach
        </ul>  
        
        <div class="pagination-block">
            {{ $posts->links() }}
        </div>

    </main>

</x-admin-layout>
