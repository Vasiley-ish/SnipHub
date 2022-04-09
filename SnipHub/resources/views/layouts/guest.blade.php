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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <style>
            .bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: #450C16;
            }
            .bg-dark-red {
                --tw-bg-opacity: 1;
                background-color: #450C16;
            }
            .hover\:bg-gray-700:hover {
                --tw-bg-opacity: 1;
                background-color: #be4362;
            }    
            .active\:bg-gray-900:active {
                --tw-bg-opacity: 1;
                background-color:  #db7991;
            }
        </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased" >
            {{ $slot }}
        </div>
    </body>
</html>
