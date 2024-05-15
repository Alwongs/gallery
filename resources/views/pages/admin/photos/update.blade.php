<x-admin-layout>
    <header class="header">
        <h1>@isset($photo){{ __('gallery.edit_photo') }}@else{{ __('gallery.new_photo') }}@endisset</h1>
    </header>

    <main class="main">

        @include('includes.common.notification')

        @if(isset($photo))
            <form class="form" action="{{ route('photos.update', $photo) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
        @else
            <form class="form" action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @endif
            @csrf

            <div class="form__input-block">
                @if($albums)
                <select name="album_id" id="album">
                    <option name="default" value="" style="color:grey;" >Select an album</option>
                    @foreach($albums as $album)
                        @if(isset($photo) && $album->id == $photo->album_id)
                            <option name="album_id" value="{{ $album->id }}" selected>{{ $album->title }}</option>
                        @else
                            <option name="album_id" value="{{ $album->id }}">{{ $album->title }}</option>
                        @endif
                    @endforeach
                </select>
                @else
                    <p style="color:red;">Create at least one album</p>
                @endif
            </div>  

            <div class="form__input-block">
                <input name="title" type="text" placeholder="title" value="{{ isset($photo) ? $photo->title : '' }}" required />
            </div>    

            <div class="form__textarea-block">
                <textarea name="description" placeholder="description">{{ isset($photo) ? $photo->description : '' }}</textarea>
            </div>

            @isset($photo)
            <div class="form__image-block">
                @if($photo->image)
                    <img src="{{ Storage::url($photo->image) ?: '' }}" alt="{{ $photo->image }}" />
                @else
                    <div class="no-photo-image"></div>
                @endif
            </div>
            @endisset

            <div class="form__file-block">
                <input id="input_file" name="image" type="file" />
                <p id="error" style="color: red;"></p>
            </div>  



            <div class="form__btn-block">
                <button type="submit" class="btn btn-green">
                    @if(isset($photo))
                        Update
                    @else
                        Save
                    @endif
                </button>
            </div>
        </form>

    </main>

</x-admin-layout>


