<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        @yield('meta')

        @if(!isset($article))
        
            <meta property="og:site_name" content="{{ config('app.name') }} | Science Meets Society">
            <meta property="og:url" content="{{ url()->full() }}" />
            <meta property="og:title" content="{{ config('app.name') }} | Science Meets Society" />
            <meta property="og:description" content="For the democratization of scientific literature" />
            <meta property="og:image" content="{{ asset('images/tsb-default.png') }}" />

            <meta name="twitter:site" content="@sciencebreaker" />
            <meta name="twitter:title" content="{{ config('app.name') }} | Science Meets Society">
            <meta name="twitter:url" content="{{ url()->full() }}" />
            <meta name="twitter:description" content="For the democratization of scientific literature">
            <meta name="twitter:image" content="{{ asset('images/tsb-default.png') }}">
            <meta name="twitter:card" content="summary_large_image">

            <meta itemprop="name" content="{{ config('app.name') }} | Science Meets Society" />
            <meta itemprop="description" content="For the democratization of scientific literature" />
            <meta itemprop="image" content="{{ asset('images/tsb-default.png') }}" />

            <meta name="description" content="For the democratization of scientific literature" />
            <meta name="keywords" content="{{ $tagsList }}" />
            <meta name="news_keywords" content="{{ $tagsList }}" />

            <link rel="image_src" href="{{ asset('images/tsb-default.png') }}" />

        @endif
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name') }} | Science meets Society</title>
        <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-32x32.png') }}" sizes="32x32" />
        <link rel="icon" type="image/png" href="{{ asset('images/favicon/favicon-16x16.png') }}" sizes="16x16" />
        <script src="{{ asset('js/pace.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/jquery-popover-0.0.3.css') }}">
        <link href="{{ asset('css/app.css') }}?version=107" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body id="page-top">
    
    @yield('earlyJS')

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    {{-- Feedback Messages --}}
    @if ($flash = session('subscription'))
        @include('admin/snippets/alerts/success')
    @endif

    @if ($errors->any())
    @include('admin/snippets/alerts/error')
    @endif

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/stickyMenu.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-popover-0.0.3.js') }}"></script>
    @yield('script')

</body>
</html>
