<div class="card card-horizontal-sm px-2 mb-2">
	<div class="align-items-center row no-gutters">
	<a class="card-image round-corners bg-image col-lg-3 col-sm-4 col-xs-12 my-1" href="{{ $article->path() }}" style="height: 6em;background-image: url(
		@if ($article->image() == 'images/no-image.png')
		{{ $article->category->iconPath() }});background-size:50%">
		@else
		{{ asset($article->image()) }});">
		@endif	
		
	</a>
	<div class="card-block pl-3  col-lg-9 col-sm-8 col-xs-12">
		<a class="text-default" href="{{ $article->path() }}">
			<p class="card-title mb-1 two-line-clamp l-height-1"><strong>{{ $article->title }}</strong></p>
		</a>
		<small class="d-block">{{ $article->created_at->toFormattedDateString() }} in <a class="breaker" href="{{ $article->category->path() }}"><strong>{{ $article->category->name }}</strong></a> | {{ $article->reading_time }} min read</small>
		<small class="d-block l-height-1">by 
			@foreach ($article->authors as $author)
			{{ $loop->first ? '' : ', ' }}
			<a href="{{ $author->path() }}">{{ $author->fullName() }}</a>
			@endforeach
		</small>
	</div>
	</div>
</div>	