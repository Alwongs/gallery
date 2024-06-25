<div class="comments-block">

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="photo_id" value="{{ $photo->id }}" />
        <div class="comments-block__input-block">
            <input type="text" name="comment" placeholder="type comment..." />
            <button type="submit">Send</button>
        </div>
    </form>

    <ul class="comments-block__list">
        @foreach($comments as $comment)
            <li class="comments-block__item comment">
                <div class="comment__avatar">
                    <div class="no-photo-avatar"></div>
                </div>
                <div class="comment__body">
                    <h5 class="comment__author">{{ $comment->author }}</h5>
                    <p class="comment__comment">{{ $comment->comment }}</p>
                    @if(auth()->user() && auth()->user()->is_root)
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn-link-style btn-link-style__delete" type="submit">Удалить</button>
                        </form>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>

</div>