@php
    if (!isset($Page_Name)){
        $Page_Name ='';
    }
@endphp



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FlyShop') }}</title>

    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css" rel="stylesheet">

    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
</head>

<body class="fixed-sidebar">
    <div id="wrapper">
        @include('admin.layouts.partials.left-side-nav')

        <div id="page-wrapper" class="gray-bg">
            @include('admin.layouts.partials.top-bar')

            @include('admin.layouts.partials.alerts')

            @yield('body_content')

            @include('admin.layouts.partials.footer')
        </div>
        @include('admin.layouts.partials.right-sidebar')
    </div>
    @include('admin.layouts.partials.script')
    @yield('Script')
</body>
</html>
