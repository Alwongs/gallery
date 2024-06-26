<x-admin-layout>
    <header class="header">
        <h1>@isset($comment){{ __('gallery.edit_comment') }}@else{{ __('gallery.new_comment') }}@endisset</h1>
    </header>

    <main class="main">

        @include('includes.common.notification')

        @if(isset($comment))
            <form class="form" action="{{ route('comments.update', $comment) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
        @else
            <form class="form" action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf 

            <div class="form__input-block">
                <input name="comment" type="text" placeholder="comment" value="{{ isset($comment) ? $comment->comment : '' }}" required />
            </div>    

            <div class="form__btn-block">
                <button type="submit" class="btn btn-green">
                    @if(isset($comment))
                        Update
                    @else
                        Save
                    @endif
                </button>
            </div>
        </form>

    </main>

</x-admin-layout>

