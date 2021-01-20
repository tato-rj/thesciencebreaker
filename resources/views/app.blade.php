<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script>
			function onSubmit(token) {
				document.getElementById("recaptcha-form").submit();
			}
		</script>
        @include('components/app/config')
    </head>
    
    <body id="page-top">
        @include('components/app/content')
        @include('components/app/scripts')
    </body>
</html>
