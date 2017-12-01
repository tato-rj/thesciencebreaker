<a href="
	mailto:?
	subject=Check out this article!&
	body=
	Hi! I found this article at TheScienceBreaker website and thought you would like it:%0A%0A
	Title: {{ $article->title }}%0A
	{{ str_plural('Author', count($article->authors->toArray())) }}: 
	@foreach($article->authors as $author)
		{{ $loop->first ? '' : ', ' }}
		{{ $author->resources()->fullName() }}
	@endforeach
	%0A%0A
	You can fing this article here:%0A
	{{ url()->full() }}%0A%0A
	For more awesome articles about science, please visit {{ config('app.url') }}%0A%0A">
		
	<i class="fa fa-envelope-open" aria-hidden="true"></i>

</a>