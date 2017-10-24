<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

    @include('partials.footer')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        
$(document).ready(function() {
    var nav = $('nav').clone().removeClass('mt-3').appendTo('header').addClass('hidden-xl-down pl-4 pr-4');
    var footer = $('footer');
    var sideBar = $('#side-bar');
    var navHeight = $('nav').outerHeight();
    var headerHeight = $('header').outerHeight();
    var screenHeight = $(window).height();
    var docHeight = $(document).height();
    var social_bar_exists = $('#side-social').length;
    if (social_bar_exists) {
        var sideSocial = $('#side-social');
        var socialOffset = $('#side-social').offset().top - headerHeight - sideSocial.height();
    }

    //KEEP MENU BAR ON STUCK TO THE TOP WHEN USER SCOLLS DOWN THE PAGE
    $(window).scroll(function () {

        var scroll = $(document).scrollTop();
        var distanceToBottom = docHeight - scroll - screenHeight;

        if (scroll < headerHeight - navHeight) {
            nav.removeClass('sticky-menu');
            if (social_bar_exists) {
                sideSocial.css('top', '0');
            }
            
        } else if (scroll > headerHeight - navHeight) {
            nav.addClass('sticky-menu');
            if (social_bar_exists) {
                sideSocial.css('top', scroll + socialOffset);
            }
        }

    });
});

    </script>
    @yield('script')

</body>
</html>
