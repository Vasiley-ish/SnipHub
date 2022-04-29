<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="shortcut icon" href="{{URL::asset('img/favicon.svg')}}" type="image/svg">
    <title>Snip HUB</title>
  
    
    <!-- Бибилиотека jQuery -->
    <script src="{{URL::asset('js/jquery.js')}}"></script>

    <script defer src="{{URL::asset('js/vue.js')}}"></script>
    <script defer src="{{URL::asset('js/script.js')}}"></script>
</head>

    @yield('intro')

<body class="body">
     
    @include('../partials/header')

    @include('../partials/messages')
    
    <main class="content">
        @yield('content')
    </main>

    <footer class="footer">
        @include('../partials/footer')
    </footer>

</body>

</html>