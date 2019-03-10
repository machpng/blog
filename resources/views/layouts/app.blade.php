<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- csrg Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Blog')</title>

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font-Awesome -->
    <link rel="stylesheet" href="{{ asset('static/css/font-awesome/css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ elixir('static/css/style.css') }}" >

    <!--[if lt IE 9]>
    <script src="{{ asset('static/js/vendor/google/html5-3.6-respond-1.1.0.min.js')}}"></script>
    <![endif]-->

    @yield('styles')
</head>
<body>
@include('layouts.header')

<div class="widewrapper main">
    @yield('content')
</div>

@include('layouts.footer')

<script src="{{ asset('static/js/jquery.js') }}"></script>
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('static/js/modernizr.js') }}"></script>
@yield('scripts')

</body>
</html>