<div class="col-lg-4 col-md-6 col-xs-12 mb-3">
	<div class="card px-2">
		<a class="card-image bg-image round-corners mb-2" href="{{ $article->paths()->route() }}" style="height: 12em; background-image: url(
			@if ($article->paths()->image() == 'images/no-image.png')
			{{ $article->category->paths()->icon() }});background-size:36%">
			@else
			{{ asset($article->paths()->image()) }});">
			@endif
		</a>
		<div class="card-block px-2">
			<a class="text-default" href="{{ $article->paths()->route() }}">
				<h6 class="card-title mb-2 two-line-clamp"><strong>{{ $article->resources()->localize('title') }}</strong></h6>
			</a>
			<p class="card-text text-muted mb-2 l-height-1 two-line-clamp">{{ $article->resources()->localize('description') }}</p>
			<small class="d-block">{{ $article->published_at->toFormattedDateString() }} | {{ $article->reading_time }} min {{__('global.read')}}</small>
		</div>
	</div>						
</div>