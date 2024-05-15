<x-admin-layout>
    <header class="header">
        <h1>{{ __('Albums') }}</h1>
    </header>

    <main class="main">

        <div class="notification-block">
            <x-session-status :status="session('status')" :info="session('info')" />
        </div>    

        <div class="add-btn-group">
            <a class="add-btn btn-icon-add" title="add new post" href="{{ route('albums.create') }}"></a>
        </div> 

        @if(count($albums) != 0)
            <ul class="manage-list">
                @foreach($albums as $album)
                <li class="manage-list__item">
                    <div class="manage-list__item-image">
                        <img src="{{ Storage::url('albums/icons/' . $album->image) ?: '' }}" alt="{{ $album->image }}" />
                    </div>  

                    <div class="manage-list__item-title">{{ $album->title }}</div> 

                    <div class="manage-list__item-date">{{ date("d.m.Y", strtotime($album->created_at)) }}</div>

                    <a href="{{ route('albums.edit', $album->id) }}" class="cell-btn btn-icon-edit"></a>

                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <button type="submit" class="cell-btn btn-icon-delete"></button> 
                    </form>     
                </li>        
                @endforeach
            </ul>  
        @else
            <p style="color:grey;text-align:center">{{ __("common.array_is_empty") }}</p>
        @endif        
        
        <div class="pagination-block">
            {{ $albums->links() }}
        </div>

    </main>

</x-admin-layout>
