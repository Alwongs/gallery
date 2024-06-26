<x-admin-layout>
    <header class="header">
        <h1>@isset($album){{ __('Update') }}@else{{ __('gallery.new_album') }}@endisset</h1>
    </header>

    <main class="main">

        @include('includes.common.notification')

        @if(isset($album))
            <form class="form" action="{{ route('albums.update', $album) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
        @else
            <form class="form" action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf

            <div class="form__input-block">
                <input 
                    type="text"
                    name="title"
                    placeholder="title"
                    value="{{ isset($album) ? $album->title : '' }}"
                    @if(isset($album)) 
                        class="input-disabled"
                        disabled
                    @else
                        required
                    @endif
                />
            </div>    

            <div class="form__textarea-block">
                <textarea name="description" placeholder="description">{{ isset($album) ? $album->description : '' }}</textarea>
            </div>

            @isset($album)
                <div class="form__image-block">
                    @if($album->image)
                        <img src="{{ Storage::url('albums/previews/' . $album->image) ?: '' }}" alt="{{ $album->image }}" />
                    @else
                        <div class="no-photo-image"></div>
                    @endif
                </div>
            @endisset

            <div class="form__file-block">
                <input 
                    id="input_file" 
                    name="image" 
                    type="file"
                    @if(!isset($album)) 
                        required
                    @endif
                />
                <p id="error" style="color: red;"></p>
            </div>  



            <div class="form__btn-block">
                <button type="submit" class="btn btn-green submit">
                    @if(isset($album))
                        Update
                    @else
                        Save
                    @endif
                </button>
            </div>
        </form>

    </main>

</x-admin-layout>


