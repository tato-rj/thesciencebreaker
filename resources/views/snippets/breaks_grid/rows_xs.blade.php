<div class="card card-horizontal-sm mb-3">

	<a class="card-image round-corners bg-image mb-1" href="{{ $article->path() }}" style="height: 5em;background-image: url(
		@if ($article->image() == 'images/no-image.png')
		{{ $article->category->iconPath() }});background-size:30%">
		@else
		{{ asset($article->image()) }});">
		@endif	
	</a>
	<div class="card-block">
		<small class="d-block mb-1">
			<span><a href="{{ $article->path() }}">{{ $article->title }}</a></span>
		</small>
		<small class="d-block">
			<em class="text-muted">by 
				@foreach ($article->authors as $author)
					{{ $loop->first ? '' : ', ' }}
					{{ $author->fullName() }}
				@endforeach
			</em>
		</small>
	</div>

</div>	
