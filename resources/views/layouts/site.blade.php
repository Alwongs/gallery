<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/site/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        {{-- <p style="color:red; background:white; transform:rotate(-30deg) translateX(-50%); position:absolute; left:50%; top:30%; z-index:10; font-size:20px; padding: 5px 20px; box-shadow: 1px 1px 10px 3px rgba(0,0,0, 0.4);">
            [ The website is on develop mode ]
        </p> --}}
        <div class="wrapper">
            @include('includes.site.aside')
            @include('includes.site.top-panel')

            {{ $slot }}

            @include('includes.site.footer')
        </div>
    </body>
</html>
