<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('components/app/config')
    </head>
    
    <body id="page-top">
        @include('components/app/content')
        @include('components/app/scripts')
    </body>
</html>
