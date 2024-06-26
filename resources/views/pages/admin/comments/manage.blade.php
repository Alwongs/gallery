<x-admin-layout>

    <main class="main">

        <div class="notification-block">
            <x-session-status :status="session('status')" :info="session('info')" />
        </div>    

        <div class="add-btn-group">
            <a class="add-btn btn-icon-add" title="add new post" href="{{ route('comments.create') }}"></a>
        </div> 

        @if(count($comments) != 0)
            <ul class="manage-list">
                @foreach($comments as $comment)
                <li class="manage-list__item">
                    <div class="manage-list__item-image">
                        <div class="no-photo-image"></div>
                    </div>  

                    <div class="manage-list__item-title">{{ $comment->comment }}</div> 

                    <div class="manage-list__item-date">{{ date("d.m.Y", strtotime($comment->created_at)) }}</div>

                    <a href="{{ route('comments.edit', $comment->id) }}" class="cell-btn btn-icon-edit"></a>
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
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
            {{ $comments->links() }}
        </div>

    </main>

</x-admin-layout>
