<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="disqus:title" content="{{ $article[0]['title'] }}">
	<meta name="disqus:slug" content="{{ $article[0]['slug'] }}">
<link href="{{ asset('css/app.css') }}?version=131" rel="stylesheet" type="text/css">
</head>
<body id="page-top">
	<div class="container mt-2">
		<div class="row">
			{{-- DISQUS --}}
			<div id="disqus_thread" class="mt-2 px-4 mb-4 w-100"></div>
		</div>
	</div>
	<script type="text/javascript" src="{{ asset('js/disqus.js') }}"></script>
</body>
</html>







