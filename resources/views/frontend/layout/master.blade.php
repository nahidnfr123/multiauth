<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FlyShop') }}</title>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{--<link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/flyshop.css') }}">--}}

</head>
<body>

<main id="app" role="main">
    @include('frontend.layout.partials.header')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @yield('main_content')

    <footer>

    </footer>
</main>


{{--<script src="{{ mix('js/flyshop.js') }}" defer></script>--}}
<script src="//code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    // Load all im ages after page load ....
    function loadImages() {
        $.each($('img'), function () {
            if ($(this).attr('data-src')) {
                var source = $(this).data('src');
                $(this).attr('src', source);
                $(this).removeAttr('data-src');
            }
        });
    }
    loadImages();
</script>
@yield('page_level_script')
</body>
</html>
