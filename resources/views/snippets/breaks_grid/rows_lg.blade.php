<div class="card card-horizontal-lg px-2 mb-4">
	<div class="row no-gutters align-items-top ">
		<a class="col-lg-3 col-xs-12 card-image bg-image round-corners mb-2" href="{{ $article->path() }}" style="height: 9em; background-image: url(
			@if ($article->image() == 'images/no-image.png')
			{{ $article->category->iconPath() }});background-size:50%">
			@else
			{{ asset($article->image()) }});">
			@endif
		</a>
		<div class="col-lg-9 col-xs-12 card-block pl-3">
			<a class="text-default" href="{{ $article->path() }}">
				<h5 class="card-title"><strong>{{ $article->title }}</strong></h5>
			</a>
			<p class="mb-2">{!! html_entity_decode($article->preview()) !!}... <a href="{{ $article->path() }}">click to read more</a></p>
		</div>		
	</div>

	<div>
		<ul class="authors">
			@foreach ($article->authors as $author)
			<small><li><strong><a href="{{ $author->path() }}" class="breaker">{{ $author->fullName() }}</a></strong> | {{ $author->position }} at {{ $author->research_institute }}</li></small>
			@endforeach
		</ul>
		@include('partials.reading-time-bar')
	</div>
</div>	