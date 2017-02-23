<!DOCTYPE html>
<html>
<head lang="{{ LaravelLocalization::setLocale() }}">
    <meta charset="UTF-8">
    @section('meta')
        <meta name="description" content="{{ Setting::get('core::site-description') }}"/>
    @show
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title'){{ Setting::get('core::site-name') }}
        @show
    </title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/lightbox2/dist/css/lightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('bower_components/aos/dist/aos.css') }}" />
    {!! Theme::style('css/main.css') !!}
    {!! Theme::style('vendor/Swiper/dist/css/swiper.min.css') !!}

    {!! Theme::script('vendor/jquery/dist/jquery.min.js') !!}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.1 1.0/jquery.min.js"></script>--}}
    {{--<script src="http://pixelcog.github.io/parallax.js/js/parallax.js"></script>--}}
    {!! Theme::script('vendor/parallax.js/parallax.js') !!}
    {!! Theme::script('vendor/Swiper/dist/js/swiper.min.js') !!}
    {!! Theme::script('vendor/bootstrap/dist/js/bootstrap.min.js') !!}
    <script src="{{ asset('bower_components/isotope/dist/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('bower_components/lightbox2/dist/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('bower_components/countUp.js/dist/countUp.min.js') }}"></script>
    <script src="{{ asset('bower_components/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('js/widgets/service_counter.js') }}"></script>
    <script src="{{ asset('js/widgets/animate_scroll.js') }}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52efa1955f679835"></script>
</head>
<body>
<div class="wrapper">
    @include('partials.header')
    @yield('carousel')
    @yield('content')
    @include('partials.footer')

    {{--{!! Theme::script('js/all.js') !!}--}}

    @yield('scripts')

    <?php if (Setting::has('core::google-analytics')): ?>
    {!! setting('core::google-analytics') !!}
    <?php endif; ?>
</div>
</body>
</html>
