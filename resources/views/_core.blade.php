<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <script src="https://use.fontawesome.com/266720d991.js"></script>
    </head>
    <body>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    {{-- Feedback Messages --}}
    @if($flash = session('subscription'))
        @include('admin/snippets/alerts/success')
    @endif
    
    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        
$(document).ready(function() {
    $('nav').addClass('original').clone().removeClass('mt-3 original').appendTo('header').addClass('pl-4 pr-4 clone');
    // var footer = $('footer');
    var sideBar = $('#side-bar');
    var navHeight = $('nav').outerHeight();
    var headerHeight = $('header').outerHeight();
    var dist = $('main').offset().top;
    // var screenHeight = $(window).height();
    // var docHeight = $(document).height();
    // var social_bar_exists = $('#side-social').length;
    // if (social_bar_exists) {
    //     var sideSocial = $('#side-social').addClass('originalSocial').clone().addClass('cloneSocial').removeClass('originalSocial').css({
    //         'position' : 'fixed',
    //         'top' : '50px',
    //         'left' : 0,
    //         'display' : 'none'
    //     });
    //     var socialOffset = $('#side-social').offset().top - headerHeight - sideSocial.height();
    // }

    //KEEP MENU BAR ON STUCK TO THE TOP WHEN USER SCOLLS DOWN THE PAGE
    $(window).scroll(function () {

        var scroll = $(document).scrollTop();
        // var distanceToBottom = docHeight - scroll - screenHeight;

        if (scroll < dist) {
            $('.original').css('visibility', 'visible');
            $('.clone').fadeOut(100);
            // if (social_bar_exists) {
            //     sideSocial.fadeOut(100);
            //     $('.originalSocial').fadeIn(200);
            // }
            
        } else if (scroll > dist) {
            $('.original').css('visibility', 'hidden');
            $('.clone').fadeIn(200);
            // if (social_bar_exists) {
            //     sideSocial.fadeIn(200);
            //     $('.originalSocial').fadeOut(100);
            // }
        }

    });
});

    </script>
    @yield('script')

</body>
</html>
