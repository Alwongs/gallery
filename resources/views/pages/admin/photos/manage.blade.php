<x-admin-layout>
    <header class="header">
        <h1>{{ __('gallery.photos') }}</h1>
    </header>

    <main class="main">

        <div class="notification-block">
            <x-session-status :status="session('status')" :info="session('info')" />
        </div>    

        <div class="add-btn-group">
            <a class="add-btn btn-icon-add" title="add new post" href="{{ route('photos.create') }}"></a>
        </div> 

        @if(count($photos) != 0)
            <ul class="manage-list">
                @foreach($photos as $photo)
                <li class="manage-list__item">
                    <div class="manage-list__item-image">
                        <img src="{{ Storage::url('/photos/icons/' . $photo->image) ?: '' }}" alt="{{ $photo->image }}" />
                    </div>  

                    <div class="manage-list__item-title">{{ $photo->title }}</div> 

                    <div class="manage-list__item-date">{{ date("d.m.Y", strtotime($photo->created_at)) }}</div>

                    <a href="{{ route('photos.edit', $photo->id) }}" class="cell-btn btn-icon-edit"></a>
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
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
            {{ $photos->links() }}
        </div>

    </main>

</x-admin-layout>
