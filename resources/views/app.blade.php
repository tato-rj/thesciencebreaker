<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('components/app/config')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
{{--         <script>
            function onSubmit(token) {
                document.getElementById("recaptcha-form").submit();
            }
        </script> --}}
        <style type="text/css">
#break-text > div {
    margin-bottom: 0 !important;
}

#break-text p {
    margin-borrom: 1.4rem !important;
}
        </style>
    </head>
    
    <body id="page-top">
        @include('components/app/content')
        @include('components/app/scripts')
    </body>
</html>
